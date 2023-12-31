<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Takshak\Adash\Http\Middleware\ReferrerMiddleware;
use Takshak\Adash\Http\Middleware\GatesMiddleware;
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

Route::middleware(['auth', GatesMiddleware::class, ReferrerMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // route for menus
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/status', [CourseController::class, 'statusToggle'])->name('courses.status');
    Route::resource('abouts', AboutController::class);
    Route::get('abouts/{about}/status', [ServiceController::class, 'statusToggle'])->name('abouts.status');
    Route::resource('services', ServiceController::class);
    Route::get('services/{service}/status', [ServiceController::class, 'statusToggle'])->name('services.status');

    Route::resource('portfolios', PortfolioController::class);
    Route::get('portfolios/{portfolio}/status', [PortfolioController::class, 'statusToggle'])->name('portfolios.status');
    Route::resource('testimonials', TestimonialController::class);
    Route::get('testimonials/{testimonial}/status', [TestimonialController::class, 'statusToggle'])->name('testimonials.status');
    Route::resource('pages', PageController::class);
    Route::get('pages/{page}/status', [PageController::class, 'statusToggle'])->name('pages.status');
    Route::delete('contacts/destroy_all', [ContactController::class, 'destroyAll'])->name('contacts.destroy.all');
    Route::resource('contacts', ContactController::class);
    Route::resource('faqs', FaqController::class);
    Route::get('faqs/{faq}/status', [FaqController::class, 'statusToggle'])->name('faqs.status');
    Route::resource('newsletters', NewsletterController::class);
    Route::resource('blog_categories', BlogCategoryController::class);
    Route::get('blog_categories/{blogCategory}/status', [BlogCategoryController::class, 'statusToggle'])->name('blog_categories.status');
    Route::resource('blogs', BlogController::class);
    Route::get('blogs/{blog}/status', [BlogController::class, 'statusToggle'])->name('blogs.status');

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('profile/edit', [AdminController::class, 'profileEdit'])->name('profile.edit');
    Route::post('profile/update', [AdminController::class, 'profileUpdate'])->name('profile.update');

    Route::resource('users', UserController::class);
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('status-toggle/{user}', 'statusToggle')->name('status-toggle');
        Route::get('profile-img/remove/{user}', 'profileImgRemove')->name('users.profile_img.remove');
    });
    Route::resource('settings', SettingController::class);
    Route::resource('queries', QueryController::class);
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('login-to/{user:id}', [UserController::class, 'loginToUser'])->name('login-to');

    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('roles', [PermissionController::class, 'rolePermissions'])->name('roles.index');
        Route::post('{role}', [PermissionController::class, 'rolePermissionsUpdate'])->name('roles.update');
    });
});
