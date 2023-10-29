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

    public function search(Request $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $email = $request->input('email');

        $query = Contact::query();

        if (!empty($name))
        {
            $query->where('family_name', 'name', 'like', "%$name%");
        }

        if (!empty($gender))
        {
            $query->where('gender', 'like', "%$gender%");
        }

        if (!empty($startDate))
        {
            $query->where('created_at', '>=', $startDate);
        }

        if (!empty($endDate))
        {
            $query->where('created_at', '<=', $endDate);
        }

        if (!empty($email))
        {
            $query->where('email', $email);
        }

        $results = $query->get()->Paginate(10);
        return view('management', ['results' => $results]);
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('management');
    }
}
