<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReceivedMail;

class InboxController extends Controller
{
    public function index(){
        $data['inbox'] = ReceivedMail::orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.inbox.index')->with($data);
    }

    public function show($id){
        $data['inbox'] = ReceivedMail::find($id);
        return view('admin.pages.inbox.show')->with($data);
    }

    public function destroy($id){
        $inbox = ReceivedMail::find($id);
        $inbox->delete();
        return redirect(route('admin.inbox'));
    }
}
