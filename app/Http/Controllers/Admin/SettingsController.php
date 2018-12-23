<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    public function index(){
        $data['setting'] = Setting::all();
        return view('admin.pages.settings')->with($data);
    }

    public function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'site_name' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email',
            'keywords' => 'required|string',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'newsletter' => 'required|string|max:200'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.settings'))->withErrors($validator)->withInput();
        } else {
            Setting::updateOrCreate(['id'=> 1], $data);

            $request->session()->flash('edit-success', 'Sent successfully');
            return redirect(route('admin.settings'));
        }
    }
}
