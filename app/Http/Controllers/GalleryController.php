<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Contact;
use App\Setting;

class GalleryController extends Controller
{
    public function index(){
        $data['image'] = Image::select('project_id', 'image')->orderBy('id', 'desc')->get();
        $data['contact'] = Contact::select('description', 'address', 'phone', 'email')->get();
        $data['setting'] = Setting::all();

        return view('main.gallery')->with($data);
    }
}
