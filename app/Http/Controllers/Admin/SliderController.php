<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Slider;

use App\Helpers\Classes\UploadClass;

class SliderController extends Controller
{
    public function index(){
        $data['slider'] = Slider::select('id', 'title', 'description', 'image')->orderBy('id', 'DESC')->get();
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

            $image = UploadClass::uploadImage($request, 'image', 'public/images');

            $slider = new Slider;
            $slider->title = request('title');
            $slider->description = request('description');
            $slider->image = '/storage/images/'. $image;
            $slider->save();

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
            $slider = Slider::find($id);
            $slider->title = request('title');
            $slider->description = request('description');

            if($request->hasFile('image')){
                $image = UploadClass::uploadImage($request, 'image', 'public/images');
                $slider->image = '/storage/images/'. $image;
            }
        
            $slider->save();

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.slider'));
        }
    }

    
    public function destroy($id){
        $all_items = Slider::all();

        if(count($all_items) > 1){
            $slider = Slider::find($id);
            $slider->delete();
        }
        
        return redirect(route('admin.slider'));
    }
}
