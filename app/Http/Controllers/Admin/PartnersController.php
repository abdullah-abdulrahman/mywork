<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;

use App\Helpers\Classes\UploadClass;

class PartnersController extends Controller
{
    public function index(){
        $data['partner'] = Partner::select('id', 'name', 'image', 'url')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.partners.index')->with($data);
    }

    public function create(){
        return view('admin.pages.partners.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'url' => 'nullable|url'
        ]);

        $image = UploadClass::uploadImage($request, 'image', 'public/images');

        $partner = new Partner;
        $partner->name = request('name');
        $partner->image = '/storage/images/'. $image;

        if ($request->has('url')) {
            $partner->url = request('url');
        }

        $partner->save();

        return redirect(route('admin.partners'));

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
        $request->validate([
            'name' => 'required|string',
            'image' => 'image',
            'url' => 'nullable|url'
        ]);

        $partner = Partner::find($id);
        $partner->name = request('name');

        if ($request->has('url')) {
            $partner->url = request('url');
        }
        if($request->hasFile('image')){
            $image = UploadClass::uploadImage($request, 'image', 'public/images');
            $partner->image = '/storage/images/'. $image;
        }
       
        $partner->save();

        return redirect(route('admin.partners'));
    }

    public function destroy($id){
        $all_items = Partner::all();

        if(count($all_items) > 1){
            $partner = Partner::find($id);
            $partner->delete();
        }
        
        return redirect(route('admin.partners'));
    }
}
