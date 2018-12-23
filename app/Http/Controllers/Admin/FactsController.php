<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Fact;

use App\Helpers\Classes\UploadClass;

class FactsController extends Controller
{
    public function index(){
        $data['facts'] = Fact::all()->first();
        return view('admin.pages.facts')->with($data);
    }

    public function update(Request $request){

        $data = $request->all();
        $validator = Validator::make($data, [
            'num-one' => 'required|integer',
            'num-two' => 'required|integer',
            'num-three' => 'required|integer',
            'num-four' => 'required|integer',
            'fact-one' => 'required|string',
            'fact-two' => 'required|string',
            'fact-three' => 'required|string',
            'fact-four' => 'required|string'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.facts'))->withErrors($validator)->withInput();
        } else {
            Fact::updateOrCreate(['id'=> 1], $data);
            $request->session()->flash('edit-success', 'Sent successfully'); 
            $data['facts'] = Fact::all()->first();        
            return redirect(route('admin.facts'))->with($data);
        }
    }
}
