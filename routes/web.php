<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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


Route::controller(WelcomeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/webalbum','webAlbum');
        Route::get('/webgallery/{album_id}','webGallery');
        Route::get('/contact-us','contactUs');
        Route::post('/contactstore','contactStore');
        Route::get('/about-us','aboutUs');
        Route::post('/storeReview','storeReview');
        Route::get('/video-gallery','videoGallery');
        Route::get('/our-results','OurResults');
    });





Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/authenticate.php';

