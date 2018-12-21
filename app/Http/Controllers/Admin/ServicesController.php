<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

use App\Helpers\Classes\UploadClass;

class ServicesController extends Controller
{
    public function index(){
        $data['service'] = Service::select('id', 'name', 'brief_description', 'description', 'image')->orderBy('id', 'DESC')->get();
        return view('admin.pages.services.index')->with($data);
    }

    public function create(){
        return view('admin.pages.services.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'brief-description' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        $image = UploadClass::uploadImage($request, 'image', 'public/images');

        $service = new Service;
        $service->name = request('name');
        $service->description = request('description');
        $service->brief_description = request('brief-description');
        $service->image = '/storage/images/'. $image;
        $service->save();

        return redirect(route('admin.services'));

    }

    public function edit($id){
        $data['id'] = $id;
        $data['service'] = Service::select('name', 'brief_description', 'description', 'image')->where('id', $id)->get();
        return view('admin.pages.services.edit')->with($data);
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|string',
            'brief-description' => 'required|string',
            'description' => 'required|string',
            'image' => 'image'
        ]);

        $service = Service::find($id);
        $service->name = request('name');
        $service->description = request('description');
        $service->brief_description = request('brief-description');

        if($request->hasFile('image')){
            $image = UploadClass::uploadImage($request, 'image', 'public/images');
            $service->image = '/storage/images/'. $image;
        }
       
        $service->save();


        return redirect(route('admin.services'));
    }

    public function destroy($id){
        $all_items = Service::all();

        if(count($all_items) > 1){
            $service = Service::find($id);
            $service->delete();
        }
        
        return redirect(route('admin.services'));
    }
}
