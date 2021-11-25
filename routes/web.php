<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ap\DashboardController;
use App\Http\Controllers\Ap\UploadImageController;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Auth::routes();

Route::group(
    [
        'prefix' => 'ap',
        'middleware' => 'isAdmin',
        'as' => 'ap.'
    ],
    function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', 'Ap\CategoryController');
        Route::resource('items', 'Ap\ItemController');
        Route::resource('orders', 'Ap\OrderController');
        Route::resource('contacts', 'Ap\ContactController');
        Route::resource('change-password', 'Ap\ResetPasswordController');
        Route::post('imgupload', [UploadImageController::class, 'imgupload'])->name('image.upload');
        Route::delete('delete-image', [App\Http\Controllers\Ap\DeleteImageController::class, 'deleteImg'])->name('delete-image');
    }
);
