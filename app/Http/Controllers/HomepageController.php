<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        $data['sliders'] = Slider::select('title', 'description', 'image')->get();
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|e-mail',
            'subject' => 'required|string|min:4|max:100',
            'message' => 'required|string'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('message-failure', 'Failed to send');
            return redirect(route('homepage').'/#contact')->withErrors($validator)->withInput();
        } else {
            ReceivedMail::create($data);
            $request->session()->flash('message-success', 'Sent successfully');         
            return redirect(route('homepage'));
        }
    }

    public function subscribe(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|e-mail'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('newsletter-failure', 'Failed to send');
            return redirect(route('homepage').'/#contact')->withErrors($validator)->withInput();
        } else {
            MailingList::create($data);
            $request->session()->flash('newsletter-success', 'Sent successfully');         
            return redirect(route('homepage'));
        }
    }
}
