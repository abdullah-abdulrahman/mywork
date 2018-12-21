<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fact;

use App\Helpers\Classes\UploadClass;

class FactsController extends Controller
{
    public function index(){
        $data['facts'] = Fact::all();
        return view('admin.pages.facts')->with($data);
    }

    public function update(Request $request){
        $request->validate([
            'num-one' => 'required|integer',
            'num-two' => 'required|integer',
            'num-three' => 'required|integer',
            'num-four' => 'required|integer',
            'fact-one' => 'required|string',
            'fact-two' => 'required|string',
            'fact-three' => 'required|string',
            'fact-four' => 'required|string'
        ]);

        $fact = Fact::find(1);
        $fact->num_one = request('num-one');
        $fact->num_two = request('num-two');
        $fact->num_three = request('num-three');
        $fact->num_four = request('num-four');
        $fact->fact_one = request('fact-one');
        $fact->fact_two = request('fact-two');
        $fact->fact_three = request('fact-three');
        $fact->fact_four = request('fact-four');

        $fact->save();

        return redirect(route('admin.facts'));

    }
}
