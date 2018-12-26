<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Setting;
use App\Service;
use App\Project;
use App\Image;

class ServicesController extends Controller
{
    public function index(){
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();
        $data['services'] = Service::select('id', 'name', 'brief_description', 'image')->get();

        return view('main.services')->with($data);
    }

    public function show($id){
        $data['id'] = $id;
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();
        $data['services'] = Service::select('id', 'name')->get();
        $data['service'] = Service::findOrFail($id);
        $data['image'] = Image::select('project_id', 'image')->orderBy('id', 'DESC')->get();
        $data['count'] = count(Project::select('id')->where('service_id', $id)->get());

        return view('main.service')->with($data);
    }
}
