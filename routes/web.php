<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryControllers;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
Route::get('/member',[MemberController::class,'index']);

Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[loginController::class,'index'])->name('login');
    Route::post('/login',[loginController::class,'post'])->name('login');
    Route::resource('/register',RegisterController::class);
});
Route::group(['middleware'=>'auth'],function(){
    // 
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::resource('/category',CategoryControllers::class);
    Route::delete('logout',[loginController::class,'logout'])->name('logout');
});