<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
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
        $data['about'] = About::select('title', 'description', 'image')->where('id', $id)->first();
        return view('admin.pages.about.edit')->with($data);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image'
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.about.edit', ['id'=> $id]))->withErrors($validator)->withInput();
        } else {
            $about = About::find($id);
            $about->title = request('title');
            $about->description = request('description');

            if($request->hasFile('image')){
                $image = UploadClass::uploadImage($request, 'image', 'public/images');
                $about->image = '/storage/images/'. $image;
            }
       
            $about->save();
                $request->session()->flash('edit-success', 'Sent successfully');         
                return redirect(route('admin.about'));
            }

    }
}
