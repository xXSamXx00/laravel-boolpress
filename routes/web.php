<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('guest.home');
})->name('home');

Route::resource('products', ProductController::class)->only(['index', 'show']);

Route::resource('posts', PostController::class)->only(['index', 'show'])->parameter('post', 'post:slug');

Route::get('blog', function () {
    return view('guest.posts.blog');
});

Route::get('contacts', 'ContactController@contacts')->name('contacts');
Route::post('contacts', 'ContactController@sendContactForm')->name('contacts.send');

Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories.posts');

Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('tags.posts');

Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('products', CreateproductController::class);

    Route::resource('posts', CreatepostController::class);

    Route::resource('categories', CreatecategoryController::class);

    Route::resource('tags', CreatetagController::class);

    Route::resource('contacts', ContactController::class);
});

Route::get('/{any}', function () {
    return view('guest.welcome');
})->where('any', '.*');
