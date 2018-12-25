<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\Partner;
use App\MailingList;

class HomeController extends Controller
{
    public function index(){
        $data['services'] = count(Service::select('id')->get());
        $data['projects'] = count(Project::select('id')->get());
        $data['partners'] = count(Partner::select('id')->get());
        $data['mailinglist'] = count(MailingList::select('id')->get());
        
        return view('admin.index')->with($data);
    }
}
