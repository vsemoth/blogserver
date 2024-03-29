<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ChristpostsController;
use App\Http\Controllers\EcrpostsController;
use App\Http\Controllers\SdpostsController;
use App\Http\Controllers\NewspostsController;

use App\Http\Controllers\PublishPost;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::patch('posts/{id}/publish', PublishPost::class)->name('posts.publish');

Route::patch('cposts/{id}/publish', PublishPost::class)->name('cposts.publish');

Route::resource('posts', PostController::class);

Route::resource('cposts', ChristpostsController::class);

Route::resource('ecrposts', EcrpostsController::class);

Route::resource('sdposts', SdpostsController::class);

Route::resource('newsposts', NewspostsController::class);
