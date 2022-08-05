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
Route::get('/lien-he', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/lien-he', [\App\Http\Controllers\HomeController::class, 'contactPost'])->name('contactPost');

//[Admin Route]

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/admin/postLogin', [\App\Http\Controllers\AdminController::class, 'postLogin'])->name('admin.postLogin'); // đối với thêm sửa xoá chúng ta thường sử dụng phương thức post cho nó bảo mật
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () { // sử dụng hàm ->middleware('auth') giúp bảo vệ router với mục đích ngăn chặn các truy cập vào trang admin khi chưa đăng nhập
    // sử dụng Route::prefix để có thể cấu hình dường dẫn theo format http://webshop.local/admin/....
    // (VD: http://webshop.local/admin/banner -> ra trang banner bình thường phải sử dụng format http://webshop.local/banner)

    Route::get('', [\App\Http\Controllers\AdminController::class, ('dashboard')])->name('dashboard');
    Route::resource('/article',\App\Http\Controllers\ArticleController::class);
    Route::resource('/banner',\App\Http\Controllers\BannerController::class);
    Route::resource('/brand',\App\Http\Controllers\BrandController::class);
    Route::resource('/contact',\App\Http\Controllers\ContactController::class);
    Route::resource('/category',\App\Http\Controllers\CategoryController::class);
    Route::resource('/product',\App\Http\Controllers\ProductController::class);
    Route::resource('/setting',\App\Http\Controllers\SettingController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::resource('/vendor', \App\Http\Controllers\VendorController::class);
});
