<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SlugController;
use App\Http\Controllers\CMS\BlogController;
use App\Http\Controllers\CMS\HomeController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gioi-thieu', function () {
    return view('cms.page.introduce');
});

Route::get('/linh-vuc-hoat-dong', function () {
    return view('cms.page.activity');
});

Route::get('/he-sinh-thai/suc-khoe', function () {
    return view('cms.page.ecosystem.health');
});

Route::prefix('/tin-tuc-su-kien')->group(function () {
    Route::get('/', [HomeController::class, 'postPage'])->name('cms.news');

    Route::get('bai-viet/{slug}', [BlogController::class, 'getPost'])->name('cms.news.post');
});

Route::get('/lien-he', function () {
    return view('cms.page.contact');
});

Route::get('/nha-dau-tu', function () {
    return view('cms.page.investor');
});



Route::prefix('/admin')->group(function () {

    Route::middleware(['preventBackHistory'])->group(function () {

        Route::get('/login', [AuthController::class, 'getLoginForm'])->name('admin.getLoginForm');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::middleware(['auth'])->group(function () {
            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            });
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            });

            Route::prefix('roles')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('admin.roles.index');
            });

            Route::prefix('posts')->group(function () {
                Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
                Route::post('/', [PostController::class, 'store'])->name('admin.posts.store');
                Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
                Route::get('/{id}', [PostController::class, 'show'])->name('admin.posts.show');
                Route::put('/{id}', [PostController::class, 'update'])->name('admin.posts.update');
                Route::delete('/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
                Route::get('/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
            });

            Route::prefix('categories')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
                Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
                Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
                Route::put('/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
                Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
                Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            });

            Route::prefix('tags')->group(function () {
                Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
            });

            Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
                Lfm::routes();
            });
        });
    });
});
