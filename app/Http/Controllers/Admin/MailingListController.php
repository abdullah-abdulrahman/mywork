<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MailingList;

use App\Helpers\Classes\UploadClass;

class MailingListController extends Controller
{
    public function index(){
        $data['mailinglist'] = MailingList::select('id', 'email', 'created_at')->orderBy('id', 'DESC')->get();
        return view('admin.pages.mailinglist')->with($data);
    }

    public function destroy($id){
        $mailinglist = MailingList::find($id);
        $mailinglist->delete();
        return redirect(route('admin.mailinglist'));
    }
}
