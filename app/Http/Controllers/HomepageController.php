<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\Team;
use App\Fact;
use App\Partner;
use App\Contact;
use App\Setting;
use App\Service;
use App\Image;
use App\Project;
use App\ReceivedMail;
use App\MailingList;

class HomepageController extends Controller
{
    public function index(){
        $data['slider'] = Slider::select('title', 'description', 'image')->get();
        $data['about'] = About::select('title', 'description', 'image')->get();
        $data['team'] = Team::select('title', 'description')->get();
        $data['fact'] = Fact::all();
        $data['partner'] = Partner::select('name', 'image', 'url')->get();
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();
        $data['services'] = Service::select('id', 'name')->get();
        $data['image'] = Image::select('project_id', 'image')->orderBy('id', 'DESC')->take(12)->get();

        return view('main.index')->with($data);
    }

    public function sendMessage(Request $request){
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|e-mail',
            'subject' => 'required|string|min:4|max:100',
            'message' => 'required|string'
        ]);

        if($errors->any()){
            dd('hello');
            $request->session()->flash('message-failure', 'Failed to send');
            return redirect(route('homepage').'/#contact');           
        } else {
            $receivedMail = new ReceivedMail;
            $receivedMail->name = request('name');
            $receivedMail->email = request('email');
            $receivedMail->subject = request('subject');
            $receivedMail->message = request('message');
            $receivedMail->save();

            $request->session()->flash('message-success', 'Sent successfully');
            
            return redirect(route('homepage'));
        }
    }

    public function subscribe(Request $request){
        $request->validate([
            'email' => 'required|e-mail'
        ]);

        $mail = new MailingList;
        $mail->email = request('email');
        $mail->save();

        $request->session()->flash('newsletter-success', 'Sent successfully');

        return redirect(route('homepage'));
    }
}
