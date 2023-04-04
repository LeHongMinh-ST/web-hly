<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepository;
use Illuminate\Http\Request;

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
}
