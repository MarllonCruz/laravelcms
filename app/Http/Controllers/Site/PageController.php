<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Visitor;

class PageController extends Controller
{
    
    public function index(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();

        if($page) {
            $ip = $request->ip();

            if($ip) {
                $v = new Visitor();
                $v->ip          = $ip;
                $v->date_access = date('Y-m-d H:i:s');
                $v->page        = '/'.$slug; 
                $v->save();
            }

            return view('site.page', [
                'page' => $page
            ]);
        } else {
            abort(404);
        }
    }

}
