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
use App\Image;
use App\Project;

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
        $data['image'] = Image::select('project_id', 'image')->orderBy('id', 'desc')->take(12)->get();

        return view('main.index')->with($data);
    }
}
