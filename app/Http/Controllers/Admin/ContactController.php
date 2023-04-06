<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContactStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ReplyContactRequest;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Jobs\SendMailReplyContact;
use App\Repositories\Contact\ContactRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(
        private ContactRepository $contactRepository
    )
    {
    }


    public function index(Request $request)
    {
        $data = $request->all();
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $contacts = $this->contactRepository->scopeQuery(function ($query) use ($data) {
            $q = $data['q'] ?? '';

            if ($q) {
                $query->where('name', 'like', "%$q%")
                    ->orWhere('subject', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('phone', 'like', "%$q%");;
            }

            if (isset($data['status'])) {
                $query->where('status', $data['status']);
            }
            return $query;
        })->paginate($limit);

        return view('admin.pages.contact.index')->with(compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contactRepository->find($id);
        $contact->load('contactReplies');
        return view('admin.pages.contact.reply')->with(compact('contact'));
    }

    public function reply(ReplyContactRequest $request, $id)
    {


        DB::beginTransaction();
        try {
            $contact = $this->contactRepository->find($id);

            if ($contact) {
                throw new ModelNotFoundException('Không tồn tại bản ghi');
            }

            $contact?->fill([
                'update_by' => auth()->id(),
                'status' => ContactStatus::Reply
            ]);

            $contact?->save();
            $message = $request->input('content');
            $contact?->contactReplies()->create([
                'message' => $message
            ]);

            SendMailReplyContact::dispatch($contact->email, $contact->name, $message);

            DB::commit();

            $request->session()->flash('success', 'Trả lời liên hệ thành công!');

            return redirect()->route('admin.contact.index');

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            Log::error('Error reply contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => [$exception->getMessage()]])
                ->withInput();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error reply contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không trả lời liên hệ']])
                ->withInput();
        }

    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $requestContact = $this->contactRepository->create($data);

            DB::commit();
            $request->session()->flash('success', 'Gửi yêu cầu thành công');
            return redirect()->route('cms.contact');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể Gửi yêu cầu']])->withInput();
        }
    }
}
