<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{

    public function contacts()
    {
        $contacts = Contact::all();
        return view('contactFol.contacts', ['contacts' => $contacts]);
    }

    public function edit(Contact $contact)
    {
        return view('contactFol.contactedit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'office_num' => 'required',
            'fax' => 'required',
            'location' => 'required',
        ]);

        $contact->update($request->all());
        return redirect()->route('contactFol.contact')->with('success', 'Contact updated successfully');
    }

    public function create()
    {
        return view('contactFol.contactcreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_num' => 'required',
            'fax' => 'required',
            'location' => 'required',
        ]);

        Contact::create($request->all());
        return redirect()->route('contactFol.contacts')->with('success', 'Contact created successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contactFol.contacts')->with('success', 'Contact deleted successfully');
    }
}
