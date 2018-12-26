<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Validator;
use File;

use App\Helpers\Classes\UploadClass;

class ServicesController extends Controller
{
    public function index(){
        $data['services'] = Service::select('id', 'name', 'brief_description', 'description', 'image')->orderBy('id', 'DESC')->get();
        return view('admin.pages.services.index')->with($data);
    }

    public function create(){
        return view('admin.pages.services.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'brief_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('create-failure', 'Failed to send');
            return redirect(route('admin.services.create'))->withErrors($validator)->withInput();
        } else {
            $image = UploadClass::uploadImage($request, 'image', SERVICES_PATH);
            Service::create($data);

            $request->session()->flash('create-success', 'Sent successfully');
            return redirect(route('admin.services'));
        }
    }

    public function show(){
        return redirect(route('admin.services'));
    }

    public function edit($id){
        $data['id'] = $id;
        $data['service'] = Service::select('name', 'brief_description', 'description', 'image')->where('id', $id)->get();
        return view('admin.pages.services.edit')->with($data);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'brief_description' => 'required|string',
            'description' => 'required|string',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.services.edit', ['id'=> $id]))->withErrors($validator)->withInput();
        } else {

            if($request->hasFile('image')){
                $old_image = Service::select('image')->where('id', $id)->first();
                $path = UPLOADS_PATH. SERVICES_PATH. $old_image['image'];
                File::delete($path);
                $image = UploadClass::uploadImage($request, 'image', SERVICES_PATH);
                $data['image'] = $image;
            }
            Service::updateOrCreate(['id'=>$id], $data);

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.services'));
        }
    }

    public function destroy($id){
        $image = Service::select('image')->where('id', $id)->first();
        $path = UPLOADS_PATH. SERVICES_PATH. $image['image'];
        File::delete($path);
        Service::destroy($id);
        
        return redirect(route('admin.services'));

    }
}
