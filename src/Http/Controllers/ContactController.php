<?php

namespace Premmohantyagi\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Premmohantyagi\Contact\Models\Contact;
use Premmohantyagi\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //
    public function index(){
    	return view('contact::contact');
    }



    //
    public function send(Request $request){
    	//return $request->all();
    	//dd($request->message, $request->firstname, $request->lastname);
    	Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->firstname, $request->lastname));
    	Contact::create($request->all());
    	return redirect(Route('contact'));
    }
}
