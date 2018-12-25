<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Http\Controllers\Controller;
use App\Partner;

use App\Helpers\Classes\UploadClass;

class PartnersController extends Controller
{
    public function index(){
        $data['partners'] = Partner::select('id', 'name', 'image', 'url')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.partners.index')->with($data);
    }

    public function create(){
        return view('admin.pages.partners.create');
    }

    public function store(Request $request){
        
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'image' => 'required|image',
            'url' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('create-failure', 'Failed to send');
            return redirect(route('admin.partners.create'))->withErrors($validator)->withInput();
        } else {
            $image = UploadClass::uploadImage($request, 'image', 'public/'.UPLOADS_PATH);
            $data['image'] = $image;
            if ($request->has('url')) {
                $data['url'] = request('url');
            }

            Partner::create($data);

            $request->session()->flash('create-success', 'Sent successfully');
            return redirect(route('admin.partners'));
        }
    }

    public function show(){
        return redirect(route('admin.partners'));
    }

    public function edit($id){
        $data['id'] = $id;
        $data['partner'] = Partner::select('name', 'url', 'image')->where('id', $id)->get();
        return view('admin.pages.partners.edit')->with($data);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'image' => 'required|image',
            'url' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.partners.edit'))->withErrors($validator)->withInput();
        } else {
            if($request->hasFile('image')){
                $old_image = Partner::select('image')->where('id', $id)->first();
                Storage::delete(UPLOADS_PATH .$old_image['image']);
                $image = UploadClass::uploadImage($request, 'image', UPLOADS_PATH);
                $data['image'] = $image;    
            }
            if ($request->has('url')) {
                $data['url'] = request('url');
            }

            Partner::updateOrCreate(['id'=>$id], $data);

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.partners'));
        }
    }

    public function destroy($id){
        $all_items = Partner::all();

        if(count($all_items) > 1){
            $image = Partner::select('image')->where('id', $id)->first();
            Storage::delete(UPLOADS_PATH .$image['image']);
            Partner::destroy($id);
        }
        
        return redirect(route('admin.partners'));
    }
}
