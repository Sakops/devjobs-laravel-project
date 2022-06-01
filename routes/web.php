<?php

use App\Http\Controllers\Listing_controller;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\UserController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//all listings
Route::get('/', [Listing_controller::class, 'index']);

//create listing
Route::get('/listings/create', [Listing_controller::class, 'create'])->middleware('auth');

//store route 
Route::post('/listings', [Listing_controller::class, 'store']);

//edit
Route::get('/listings/{listing}/edit', [Listing_controller::class, 'edit'])->middleware('auth');

//update submit 
Route::put('/listings/{listing}', [Listing_controller::class, 'update']);

//delete 
Route::delete('/listings/{listing}', [Listing_controller::class, 'destroy'])->middleware('auth');

//manage posts 
Route::get('/listings/manage', [Listing_controller::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}', [Listing_controller::class, 'show']);


// Route::get('/Hello', function() {
//     return response("Hello", 200)
//     ->header("Content-Type", "text/plain")
//     ->header("X-Header-One", "Header Value");
// });
// Route::get('/posts/{id}', function($id) {
//     ddd($id);
//     return response("Post " . $id);
// })->where('id', '[0-9]+');


//create user form 
Route::get('/register', [UserController::class, 'create'] );

//create new user 
Route::post('/users', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout']);

//login form 
Route::get('/login', [UserController::class, 'login'])->
name('login');

//login user
Route::post('/authenticate', [UserController::class, 'authenticate']);

