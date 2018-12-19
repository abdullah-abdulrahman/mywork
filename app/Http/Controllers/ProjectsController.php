<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Setting;
use App\Project;
use App\Image;

class ProjectsController extends Controller
{
    public function show($id){
        $data['id'] = $id;
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();
        $data['project'] = Project::findOrFail($id);
        $data['project_image'] = Image::select('image')->where('project_id', $id)->get();

        return view('main.project')->with($data);
    }

}
