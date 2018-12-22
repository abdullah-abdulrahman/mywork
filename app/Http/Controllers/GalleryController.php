<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Contact;
use App\Setting;
use App\Service;

class GalleryController extends Controller
{
    public function index(){
        $data['image'] = Image::select('project_id', 'image')->orderBy('id', 'DESC')->get();
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();
        $data['services'] = Service::select('id', 'name')->get();

        return view('main.gallery')->with($data);
    }
}
