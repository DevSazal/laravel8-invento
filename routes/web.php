<?php

use Illuminate\Support\Facades\Route;
// call Controller
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[UserController::class, 'registerPage']);
Route::post('/register',[UserController::class, 'registerUser'])->name('register');

Route::get('/login',[UserController::class, 'loginPage']);
Route::post('/login',[UserController::class, 'loginUser'])->name('login');

Route::get('/logout', function(){
  Session::forget('user');
  return redirect('/login');
});

Route::get('/app',[Backend\DefaultController::class, 'dashboard']);
Route::resource('/app/category', Backend\CategoryController::class, ['as'=>'app']);
