<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryControllers;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('store');
})->name('home');

Route::get('/member', [MemberController::class, 'index']);



Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'post'])->name('login');
    Route::resource('/register', RegisterController::class);
});
Route::group(['middleware' => 'auth'], function () {

    
    Route::get('store', [StoreController::class, 'index'])->name('store');
    Route::post('store/{product}', [StoreController::class, 'addcart'])->name('addcart');
    Route::get('cart', [StoreController::class, 'cart'])->name('cart');
    Route::get('address', [StoreController::class, 'address'])->name('address');
    Route::post('address',[StoreController::class,'storeAddress'])->name('storeAddress');
  

    Route::group(
        ['middleware' => 'adminlevel'],
        function () {
            Route::get('admin', [AdminController::class, 'index'])->name('admin');
            Route::resource('category', CategoryControllers::class);
            Route::resource('product', ProductController::class);
            
        }

    );
    Route::delete('logout', [loginController::class, 'logout'])->name('logout');
});

Route::get('test',function ()
{
    Mail::to('saranyoo2002@gmail.com')->send(new TestMail);

    
});