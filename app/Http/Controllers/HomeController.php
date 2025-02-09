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

        //--------- Requset Input presence (has , filling , missing) ------- 
        // dd($request->has('name'));
        // dd($request->hasAny(['name','age'])); work with array has name -or- age
        // $request->whenHas('name',function(){
        //     dd('requstet  has name');
        // },function(){
        //     dd('requset dosent have name ');
        // });
        // dd($request->filled('age')); // is it have value -- shold be exist and have value
        // dd($request->anyFilled(['name','age'])); // like the has any
        // $request->whenFilled('name',function(){
        //     dd('requset have filled');
        // }, function(){
        //     dd('requset have not  filled');
        // });

        // dd($request->missing('name')); //is the name deleted or not exisit -- it's the opposite of the has 
        // $request->whenMissing('name', function () {
        //     dd('requset have missing');
        // }, function () {
        //     dd('requset have not  missing');
        // });

        return view('welcome');
    }
}
