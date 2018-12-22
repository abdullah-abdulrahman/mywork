<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\Image;

use App\Helpers\Classes\UploadClass;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index(){
        $data['projects'] = Project::select('id', 'service_id', 'title', 'description')->orderBy('id', 'DESC')->paginate(10);
        // $data['images'] = Image::select('id', 'project_id', 'image')->orderBy('id', 'DESC')->get();
        return view('admin.pages.projects.index')->with($data);
    }

    public function create(){
        $data['services'] = Service::select('id', 'name')->get();
        return view('admin.pages.projects.create')->with($data);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'service-id' => 'required|numeric',
            'image' => 'required|image'
        ]);

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

        return redirect(route('admin.projects'));

    }

    public function show(){
        return redirect(route('admin.projects'));
    }

    public function edit($id){
        $data['id'] = $id;
        $data['project'] = Project::select('service_id', 'title', 'description')->where('id', $id)->get();
        $data['services'] = Service::select('id', 'name')->get();
        return view('admin.pages.projects.edit')->with($data);
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'service-id' => 'required|numeric',
            'image' => 'image'
        ]);

        $project = Project::find($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        
        if($request->hasFile('image')){
            $image = Image::select('image')->where('project_id', $id)->get();
            $image_path = $image[0]->image;
            Storage::delete($image_path);

            $uploaded_image = UploadClass::uploadImage($request, 'image', 'public/images');
            $image[0]->image = '/storage/images/'. $uploaded_image;
            $image[0]->save();
        }

        return redirect(route('admin.projects'));
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
