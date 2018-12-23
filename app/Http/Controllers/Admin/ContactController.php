<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
        $data['contact'] = Contact::all();
        return view('admin.pages.contact')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email'
        ]);

        $contact = Contact::find(1);

        $contact->description = request('description');
        $contact->address = request('address');
        $contact->phone = request('phone');
        $contact->email = request('email');

        $contact->save();

        $request->session()->flash('edit-success', 'Sent successfully');

        return redirect(route('admin.contact'));
    }
}
