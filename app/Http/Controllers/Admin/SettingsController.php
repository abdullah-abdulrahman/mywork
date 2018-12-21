<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    public function index(){
        $data['setting'] = Setting::all();
        return view('admin.pages.settings')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'site_name' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email',
            'keywords' => 'required|string',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'newsletter' => 'required|string|max:200'
        ]);

        $setting = Setting::find(1);
        $setting->site_name = request('site_name');
        $setting->description = request('description');
        $setting->email = request('email');
        $setting->keywords = request('keywords');
        $setting->facebook = request('facebook');
        $setting->linkedin = request('linkedin');
        $setting->instagram = request('instagram');
        $setting->newsletter = request('newsletter');
        $setting->save();

        return redirect(route('admin.settings'));
    }
}
