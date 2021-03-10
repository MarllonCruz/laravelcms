<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();

        if($ip) {
            $v = new Visitor();
            $v->ip          = $ip;
            $v->date_access = date('Y-m-d H:i:s');
            $v->page        = '/'; 
            $v->save();
        }

        return view('site.home');
    }
}
