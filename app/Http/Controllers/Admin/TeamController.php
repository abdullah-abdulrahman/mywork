<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;

class TeamController extends Controller
{
    public function index(){
        $data['team'] = Team::select('title', 'description')->get();
        return view('admin.pages.team')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $team = Team::find(1);
        $team->title = request('title');
        $team->description = request('description');
        $team->save();

        return redirect(route('admin.team'));
    }
}
