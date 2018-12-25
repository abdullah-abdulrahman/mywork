<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Http\Controllers\Controller;
use App\Slider;

use App\Helpers\Classes\UploadClass;

class SliderController extends Controller
{
    public function index(){
        $data['sliders'] = Slider::select('id', 'title', 'description', 'image')->orderBy('id', 'DESC')->get();
        return view('admin.pages.slider.index')->with($data);
    }

    public function create(){
        return view('admin.pages.slider.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('create-failure', 'Failed to send');
            return redirect(route('admin.slider.create'))->withErrors($validator)->withInput();
        } else {

            $image = UploadClass::uploadImage($request, 'image', 'public/'.UPLOADS_PATH);
            $data['image'] = $image;
            Slider::create($data);

            $request->session()->flash('create-success', 'Sent successfully');
            return redirect(route('admin.slider'));
        }

    }


    public function show(){
        return redirect(route('admin.slider'));
    }


    public function edit($id){
        $data['id'] = $id;
        $data['slider'] = Slider::select('title', 'description', 'image')->where('id', $id)->first();
        return view('admin.pages.slider.edit')->with($data);
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
            return redirect(route('admin.slider.edit', ['id'=> $id]))->withErrors($validator)->withInput();
        } else {

            if($request->hasFile('image')){
                $old_image = Slider::select('image')->where('id', $id)->first();
                Storage::delete(UPLOADS_PATH .$old_image['image']);

                $image = UploadClass::uploadImage($request, 'image', UPLOADS_PATH);
                $data['image'] = $image;
            }
        
            Slider::updateOrCreate(['id'=>$id], $data);

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.slider'));
        }
    }

    
    public function destroy($id){
        $all_items = Slider::all();

        if(count($all_items) > 1){
            $image = Slider::select('image')->where('id', $id)->first();
            Storage::delete(UPLOADS_PATH .$image['image']);
            Slider::destroy($id);
        }
        
        return redirect(route('admin.slider'));
    }
}
