<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function cForm()
    {
        return view('c-form');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['family_name', 'name', 'gender', 'email', 'postal', 'address', 'building', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')
                        ->withInput();
        }
        $contact = $request->only(['family_name', 'name', 'gender', 'email', 'postal', 'address', 'building', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function management()
    {
        $contacts = Contact::Paginate(10);
        return view('management', ['contacts' => $contacts]);
    }
}
