<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('user.pages.contact');
    }

    public function addcontact(ContactRequest $request){
        $contact = new Contact;
        $contact-> contact_name = $request['contact_name'];
        $contact-> contact_email = $request['contact_email'];
        $contact-> contact_subject = $request['contact_subject'];
        $contact-> contact_message = $request['contact_message'];
        $contact->save();
        return redirect()->back();
    }

    public function show(){
        $contacts= Contact::all();
        return view('admin.pages.contact',compact('contacts'));
    }

    public function delete($id){
        Contact::find($id)->delete();
        return redirect()->back();
    }
}
