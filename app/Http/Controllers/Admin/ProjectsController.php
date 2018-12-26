<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\Image;
use File;

use App\Helpers\Classes\UploadClass;

class ProjectsController extends Controller
{
    public function index(){
        $data['projects'] = Project::select('id', 'service_id', 'title', 'description')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.projects.index')->with($data);
    }

    public function create(){
        $data['services'] = Service::select('id', 'name')->get();
        return view('admin.pages.projects.create')->with($data);
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            'service_id' => 'required|numeric',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('create-failure', 'Failed to send');
            return redirect(route('admin.projects.create'))->withErrors($validator)->withInput();
        } else {
            $image = UploadClass::uploadImage($request, 'image', PROJECTS_PATH);

            Project::create($data);

            $current_project = Project::select('id')->orderBy('id', 'DESC')->first();
            $data['project_id'] = $current_project['id'];
            $data['image'] = $image;

            Image::create($data);

            $request->session()->flash('create-success', 'Sent successfully');
            return redirect(route('admin.projects'));
        }


    }

    public function show(){
        return redirect(route('admin.projects'));
    }

    public function edit($id){
        $data['id'] = $id;
        $data['project'] = Project::select('service_id', 'title', 'description')->where('id', $id)->first();
        $data['services'] = Service::select('id', 'name')->get();
        return view('admin.pages.projects.edit')->with($data);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            'service_id' => 'required|numeric',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.projects.edit', ['id'=> $id]))->withErrors($validator)->withInput();
        } else {
            Project::updateOrCreate(['id'=>$id], $data);

            if($request->hasFile('image')){
                $old_image = Image::select('image')->where('project_id', $id)->first();
                $path = UPLOADS_PATH. PROJECTS_PATH. $old_image['image'];
                File::delete($path);
                $image = UploadClass::uploadImage($request, 'image', PROJECTS_PATH);
                $data['image'] = $image;
                Image::updateOrCreate(['id'=>$id], $data);    
            }

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.projects'));
        }
    }

    
    public function destroy($id, Request $request){
        $image = Image::select('image')->where('project_id', $id)->first();
        $path = UPLOADS_PATH. PROJECTS_PATH. $image['image'];
        File::delete($path);
        Project::destroy($id);
        
        return redirect(route('admin.projects'));
    }
}
