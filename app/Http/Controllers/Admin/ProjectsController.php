<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\Image;

use App\Helpers\Classes\UploadClass;
use Illuminate\Support\Facades\Storage;

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
            'service-id' => 'required|numeric',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('create-failure', 'Failed to send');
            return redirect(route('admin.projects.create'))->withErrors($validator)->withInput();
        } else {
            $uploaded_image = UploadClass::uploadImage($request, 'image', 'public/images');

            $project = new Project;
            $project->title = request('title');
            $project->description = request('description');
            $project->service_id = request('service-id');
            $project->save();

            $current_project = Project::select('id')->orderBy('id', 'DESC')->first();

            $image = new Image;
            $image->project_id = $current_project->id;
            $image->image = '/storage/images/'. $uploaded_image;
            $image->save();

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
            'service-id' => 'required|numeric',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.projects.edit', ['id'=> $id]))->withErrors($validator)->withInput();
        } else {
            $project = Project::find($id);
            $project->title = request('title');
            $project->description = request('description');
            $project->service_id = request('service-id');
            $project->save();
            
            if($request->hasFile('image')){
                $image = Image::select('image')->where('project_id', $id)->first();
                $image_path = $image->image;
                Storage::delete($image_path);

                $uploaded_image = UploadClass::uploadImage($request, 'image', 'public/images');
                $image[0]->image = '/storage/images/'. $uploaded_image;
                $image[0]->save();
            }

            $request->session()->flash('edit-success', 'Sent successfully');

            return redirect(route('admin.projects'));
        }
    }

    
    public function destroy($id){
        $all_items = Project::all();

        if(count($all_items) > 1){
            $project = Project::find($id);
            $project->delete();
        }
        
        return redirect(route('admin.projects'));
    }
}
