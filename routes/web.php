<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
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
// Home page
Route::get('/', [HomeController::class, 'home'])->name('home');
// about page
Route::get('about', [HomeController::class, 'about'])->name('about');
// contact page
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

// faq
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
// testimonials
Route::get('testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
// portfolio
Route::get('portfolios', [HomeController::class, 'portfolios'])->name('portfolios');
Route::get('portfolio/{portfolio}', [HomeController::class, 'portfolio'])->name('portfolio');

// blog system
Route::get('blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('blog/{blog:slug}', [HomeController::class, 'blog'])->name('blog');

// course system
Route::get('courses', [HomeController::class, 'courses'])->name('courses');
Route::get('course/{course:slug}', [HomeController::class, 'course'])->name('course');

// service pages
Route::get('service/{service:slug}', [HomeController::class, 'service'])->name('service');

Route::post('queries', [QueryController::class, 'store'])->name('queries.store');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
