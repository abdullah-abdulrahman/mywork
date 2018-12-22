<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        $image = UploadClass::uploadImage($request, 'image', 'public/images');

        $slider = new Slider;
        $slider->title = request('title');
        $slider->description = request('description');
        $slider->image = '/storage/images/'. $image;
        $slider->save();

        return redirect(route('admin.slider'));

    }

    public function show(){
        return redirect(route('admin.slider'));
    }

    public function edit($id){
        $data['id'] = $id;
        $data['slider'] = Slider::select('title', 'description', 'image')->where('id', $id)->get();
        return view('admin.pages.slider.edit')->with($data);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image'
        ]);

        $slider = Slider::find($id);
        $slider->title = request('title');
        $slider->description = request('description');

        if($request->hasFile('image')){
            $image = UploadClass::uploadImage($request, 'image', 'public/images');
            $slider->image = '/storage/images/'. $image;
        }
       
        $slider->save();

        return redirect(route('admin.slider'));
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
