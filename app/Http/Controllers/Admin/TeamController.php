<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Team;

class TeamController extends Controller
{
    public function index(){
        $data['team'] = Team::select('title', 'description')->get();
        return view('admin.pages.team')->with($data);
    }

    public function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.team'))->withErrors($validator)->withInput();
        } else {
            Team::updateOrCreate(['id'=> 1], $data);
            $request->session()->flash('edit-success', 'Sent successfully');         
            return redirect(route('admin.team'));
        }
    }
}
