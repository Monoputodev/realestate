<?php

use App\Http\Controllers\AwardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
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

Route::get('/mail', [PublicController::class, 'mail'])->name('mail');
Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/dashboard', [PublicController::class, 'dashboard'])->middleware('auth')->name('dashboard.index');
Route::get('/news/{blog}', [PublicController::class, 'blogDetails'])->name('blog.details');
Route::get('/News', [PublicController::class, 'blogs'])->name('blogs.all');

Route::get('/services', [PublicController::class, 'services'])->name('service.index');
Route::get('/service/{id}', [PublicController::class, 'servicedetails'])->name('service.details');


Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/project/{blog}', [PublicController::class, 'projectDetails'])->name('project.details');
Route::get('/project', [PublicController::class, 'projects'])->name('projects.all');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('/dashboard')->middleware('auth', 'admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('admin/profile', [UserController::class, 'index'])->name('dashboard.profile.index');
    Route::put('admin/profile/update/{id}', [UserController::class, 'update'])->name('dashboard.profile.update');
    Route::prefix('services')->group(function () {
        // Service-Routes
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::get('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::get('/active/{service}', [ServiceController::class, 'active'])->name('services.active');
        Route::get('/inactive/{service}', [ServiceController::class, 'inactive'])->name('services.inactive');
    });
    Route::prefix('projects')->group(function () {
        // Service-Routes
        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::get('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });
    Route::prefix('Awards')->group(function () {
        // Award-Routes
        Route::get('/', [AwardController::class, 'index'])->name('awards.index');
        Route::get('/create', [AwardController::class, 'create'])->name('awards.create');
        Route::post('/', [AwardController::class, 'store'])->name('awards.store');
        Route::get('/{award}', [AwardController::class, 'show'])->name('awards.show');
        Route::get('/{award}/edit', [AwardController::class, 'edit'])->name('awards.edit');
        Route::put('/{award}', [AwardController::class, 'update'])->name('awards.update');
        Route::get('/{award}', [AwardController::class, 'destroy'])->name('awards.destroy');
        Route::get('/active/{award}', [AwardController::class, 'active'])->name('awards.active');
        Route::get('/inactive/{award}', [AwardController::class, 'inactive'])->name('awards.inactive');
    });
    Route::prefix('testimonials')->group(function () {
        // Testimonial-Routes
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show');
        Route::get('/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::get('/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
        Route::get('/active/{testimonial}', [TestimonialController::class, 'active'])->name('testimonials.active');
        Route::get('/inactive/{testimonial}', [TestimonialController::class, 'inactive'])->name('testimonials.inactive');
    });

    Route::prefix('faqs')->group(function () {
        // Faq-Routes
        Route::get('/', [FaqController::class, 'index'])->name('faqs.index');
        Route::get('/create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('/', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/{faq}', [FaqController::class, 'show'])->name('faqs.show');
        Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::put('/{faq}', [FaqController::class, 'update'])->name('faqs.update');
        Route::get('/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
        Route::get('/active/{faq}', [FaqController::class, 'active'])->name('faqs.active');
        Route::get('/inactive/{faq}', [FaqController::class, 'inactive'])->name('faqs.inactive');
    });



    Route::prefix('blogs')->group(function () {
        // Blog-Routes
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/active/{blog}', [BlogController::class, 'active'])->name('blogs.active');
        Route::get('/inactive/{blog}', [BlogController::class, 'inactive'])->name('blogs.inactive');
    });

    Route::prefix('news')->group(function () {
        // Blog-Routes
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/', [NewsController::class, 'store'])->name('news.store');
        Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::get('/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
        Route::get('/active/{news}', [NewsController::class, 'active'])->name('news.active');
        Route::get('/inactive/{news}', [NewsController::class, 'inactive'])->name('news.inactive');
    });
    Route::prefix('photos')->group(function () {
        // Photo-Routes
        Route::get('/', [PhotoController::class, 'index'])->name('photos.index');
        Route::get('/create', [PhotoController::class, 'create'])->name('photos.create');
        Route::post('/', [PhotoController::class, 'store'])->name('photos.store');
        Route::get('/{photo}', [PhotoController::class, 'show'])->name('photos.show');
        Route::get('/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
        Route::put('/{photo}', [PhotoController::class, 'update'])->name('photos.update');
        Route::get('/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
        Route::get('/active/{photo}', [PhotoController::class, 'active'])->name('photos.active');
        Route::get('/inactive/{photo}', [PhotoController::class, 'inactive'])->name('photos.inactive');
    });
    Route::prefix('clients')->group(function () {
        // Client-Routes
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{client}', [ClientController::class, 'show'])->name('clients.show');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::get('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
        Route::get('/active/{client}', [ClientController::class, 'active'])->name('clients.active');
        Route::get('/inactive/{client}', [ClientController::class, 'inactive'])->name('clients.inactive');
    });

    Route::prefix('heros')->group(function () {
        // hero-Routes
        Route::get('/', [HeroController::class, 'index'])->name('heros.index');
        Route::get('/create', [HeroController::class, 'create'])->name('heros.create');
        Route::post('/', [HeroController::class, 'store'])->name('heros.store');
        Route::get('/{hero}', [HeroController::class, 'show'])->name('heros.show');
        Route::get('/{hero}/edit', [HeroController::class, 'edit'])->name('heros.edit');
        Route::put('/{hero}', [HeroController::class, 'update'])->name('heros.update');
        Route::get('/{hero}', [HeroController::class, 'destroy'])->name('heros.destroy');
        Route::get('/active/{hero}', [HeroController::class, 'active'])->name('heros.active');
        Route::get('/inactive/{hero}', [HeroController::class, 'inactive'])->name('heros.inactive');
    });



    Route::prefix('content')->group(function () {
        // Hero-Routes
        Route::get('/about/{content}/edit', [ContentController::class, 'editAbout'])->name('about.edit');
        Route::put('/about/{content}', [ContentController::class, 'updateAbout'])->name('about.update');

        Route::get('/general/{content}/edit', [ContentController::class, 'editGeneral'])->name('general.edit');
        Route::put('/general/{content}', [ContentController::class, 'updateGeneral'])->name('general.update');
        Route::get('/contact/{content}/edit', [ContentController::class, 'editContact'])->name('contact.edit');
        Route::put('/contact/{content}', [ContentController::class, 'updateContact'])->name('contact.update');
        Route::get('/social/{content}/edit', [ContentController::class, 'editSocial'])->name('social.edit');
        Route::put('/social/{content}', [ContentController::class, 'updateSocial'])->name('social.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
