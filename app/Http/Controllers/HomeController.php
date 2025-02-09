<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        //--------- Requset path and method----------- 
        // dd($request->path());  to show the path 
        // to cheack a condition 
        // dd($request->is('/'));
        // dd($request->routeIs('home'));
        // dd($request->url());
        // dd($request->fullUrl()); with the all arameters
        // dd($request->fullUrlWithoutQuery('age')); for the fillters
        // dd($request->method());
        // dd($request->isMethod('post'));

        return view('welcome');
    }
}
