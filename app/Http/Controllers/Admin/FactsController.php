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

        $id = 1;
        $data = $request->all();
        $validator = Validator::make($data, [
            'num_one' => 'required|integer',
            'num_two' => 'required|integer',
            'num_three' => 'required|integer',
            'num_four' => 'required|integer',
            'fact_one' => 'required|string',
            'fact_two' => 'required|string',
            'fact_three' => 'required|string',
            'fact_four' => 'required|string'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit-failure', 'Failed to send');
            return redirect(route('admin.facts'))->withErrors($validator)->withInput();
        } else {
            Fact::updateOrCreate(['id'=> $id], $data);
            $request->session()->flash('edit-success', 'Sent successfully'); 
            return redirect(route('admin.facts'));
        }
    }
}
