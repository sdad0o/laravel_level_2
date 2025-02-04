<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// using the prefix 
// Route::prefix('admins')->group(function () {
//     Route::get('/', function () {
//         echo 'this is the admin php file ';
//     });
// });

Route::get('/', function () {
    echo 'this is the admin php file ';
});
