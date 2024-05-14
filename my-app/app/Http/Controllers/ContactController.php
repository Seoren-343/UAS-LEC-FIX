<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::all();
        return view('contactFol.contacts', ['contacts' => $contacts]);
    }
    
    

    public function edit(Contact $contact) {
        $contacts = Contact::all(); // Fetch all contacts
        return view('contactFol.contactedit', compact('contact', 'contacts'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'office_num' => 'required',
            'fax' => 'required',
            'location' => 'required',
        ]);
    
        $contact->update([
            'office_num' => $request->office_num,
            'fax' => $request->fax,
            'location' => $request->location,
        ]);
    
        return redirect()->route('contactFol.contacts')->with('success', 'Contact updated successfully');
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
