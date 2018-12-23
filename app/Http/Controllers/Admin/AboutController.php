<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

use App\Helpers\Classes\UploadClass;

class AboutController extends Controller
{
    public function index(){
        $data['abouts'] = About::select('id', 'title', 'description', 'image')->get();
        return view('admin.pages.about.index')->with($data);
    }

    public function edit($id){
        $data['id'] = $id;
        $data['about'] = About::select('title', 'description', 'image')->where('id', $id)->get();
        return view('admin.pages.about.edit')->with($data);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image'
        ]);

        $about = About::find($id);
        $about->title = request('title');
        $about->description = request('description');

        if($request->hasFile('image')){
            $image = UploadClass::uploadImage($request, 'image', 'public/images');
            $about->image = '/storage/images/'. $image;
        }
       
        $about->save();

        return redirect(route('admin.about'));
    }
}
