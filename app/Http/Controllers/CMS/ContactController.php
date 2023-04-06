<?php

namespace App\Http\Controllers\CMS;

use App\Enums\ContactStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ReplyContactRequest;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Jobs\SendMailReplyContact;
use App\Repositories\Contact\ContactRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(
        private ContactRepository $contactRepository
    )
    {
    }

    public function index()
    {

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
