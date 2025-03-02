<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

// applay the rate limiter after register it in the route service provider
// Route::get('/', HomeController::class)->middleware(['throttle:watch_limiter'])->name('home');

// Example for the route constraints
// Route::get('/users/{name}',HomeController::class)->where('name','[a-z]+'); //it take the latters from a-z in small latter
// Route::get('/users/{id}/{name}', HomeController::class)->where([['name'=>'[a-z]+'],['id'=>'[0-9]+']]);
// Route::get('/users/{id}/{name}', HomeController::class)->whereNumber('id')->whereAlpha('name');

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(). '/dashboard',
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ],
//     function () {
//     // dd(request()->segment(1));

//     // ==================================== dashboard main page10. 

//     // passing parameter to the middleware
//     Route::view('/', 'dashboard')->middleware('test:ahmed')->name('dashboard');

//     Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');

//     // ============================================= products
//     Route::resource('products', ProductController::class)->except('show');
// });

// -----------------------Custom way for localization (manual) ------------------------------

Route::prefix('dashboard')->group(function () {
    // dd(request()->segment(1));

    // ==================================== dashboard main page10. 

    // passing parameter to the middleware
    Route::view('/', 'dashboard')->middleware('test:ahmed')->name('dashboard');

    // example on manual slug now the space be like  " %20 " and we don't want this 
    // Route::get('products/show/{product:name}', [ProductController::class, 'show'])->name('products.show');

    // example on the semi atomated slug 
    // Route::get('products/show/{product:slug}', [ProductController::class,'show'])->name('products.show');

    Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');

    // ============================================= products
    Route::resource('products', ProductController::class)->except('show');
});


//  if the user enter a undifind route 
Route::fallback(function () {
    return to_route('home');
});

// Route::middleware('auth')->group(function () {

//   IF YOU WANT SPECIFIC ROUTE DON'T GET A MIDDLEWARE WITHIN GROU JUST USE THIS 
//     Route::get('/profile', [ProfileController::class, 'edit'])->withoutMiddleware('auth')->name('profile.edit');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// another way to do it but you need prefix
// require __DIR__ . '/admin.php';
// require __DIR__ . '/merchant.php';