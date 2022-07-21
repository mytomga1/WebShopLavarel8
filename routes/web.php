<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);

//[Admin Route]
Route::prefix('admin')->name('admin.')->group(function () {
    // sử dụng Route::prefix để có thể cấu hình dường dẫn theo format http://webshop.local/admin/....
    // (VD: http://webshop.local/admin/banner -> ra trang banner bình thường phải sử dụng format http://webshop.local/banner)

    Route::get('', [\App\Http\Controllers\AdminController::class, ('dashboard')])->name('dashboard');
    Route::resource('/banner',\App\Http\Controllers\BannerController::class);
    Route::resource('/category',\App\Http\Controllers\CategoryController::class);
    Route::resource('/article',\App\Http\Controllers\ArticleController::class);
});
