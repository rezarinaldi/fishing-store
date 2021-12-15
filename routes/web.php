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

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@create')->name('contact.create');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('add-to-cart/{id}', 'CartController@addCart')->name('add.to.cart');
    Route::post('store', 'CartController@store')->name('cart.store');
    // Route::delete('delete-product/{id}', 'CartController@remove')->name('cart-delete');

    // Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/setting/transactions', 'TransactionController@index')
        ->name('transaction');
    Route::get('/setting/transaction-details', 'TransactionController@details') // mek gae nampilne
        ->name('transaction-detail');
    // Route::get('/setting/transactions/{id}', 'TransactionController@details')
    //     ->name('transaction-detail');
    // Route::post('/setting/transactions/{id}', 'TransactionController@update')

    Route::get('/setting/reviews', 'ReviewController@index')
        ->name('review');
    Route::post('/setting/reviews', 'ReviewController@store')
        ->name('review-store');
    Route::get('/setting/reviews/{id}', 'ReviewController@details')
        ->name('review-details');
    Route::post('/setting/reviews/{id}', 'ReviewController@update')
        ->name('review-update');

    Route::get('/setting/account', 'AccountController@index')
        ->name('account');
    Route::post('/setting/update/{redirect}', 'AccountController@update')
        ->name('settings-redirect');
});

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
        Route::resource('settings', 'Ap\SettingController');
        Route::post('imgupload', [UploadImageController::class, 'imgupload'])->name('image.upload');
        Route::delete('delete-image', [App\Http\Controllers\Ap\DeleteImageController::class, 'deleteImg'])->name('delete-image');
    }
);

Auth::routes();
