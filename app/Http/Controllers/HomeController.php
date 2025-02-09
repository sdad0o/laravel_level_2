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
        // dd($request->path());  //to show the path 
        // to cheack a condition 
        // dd($request->is('/'));
        // dd($request->routeIs('home'));
        // dd($request->url());
        // dd($request->fullUrl()); //with the all arameters
        // dd($request->fullUrlWithoutQuery('age')); //for the fillters
        // dd($request->method());
        // dd($request->isMethod('post'));

        //--------- Requset Input ------------------- 
        // dd($request->all());
        // dd($request->collect()); //the same but it's collection type
        // dd($request->input()); // return array  use POST
        // dd($request->query()); // using the qurey parameter use GET
        // dd($request->boolean('is_admin'));
        // dd($request->date('date'));
        // dd($request->only('name'));
        // dd($request->except('age'));
        // dd($request->only(['name','age']));
        
        return view('welcome');
    }
}
