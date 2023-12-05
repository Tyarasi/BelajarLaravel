<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use DB;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::all(); 
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        
        return Redirect()->route('admin.contact')->with('success', 'Contact Insertes Successfully');   
    }

    public function Delete($id){
        Contact::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact Delete Successfully');
    }

    public function Contact(){
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        
        return Redirect()->route('contact')->with('success', 'Contact Insertes Successfully');   
    
    }

    public function AdminMessage(){
        $messages = ContactForm::all(); 
        return view('admin.contact.message', compact('messages'));
    }

    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success', 'Message Delete Successfully');
    }

}