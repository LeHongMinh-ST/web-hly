<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('frontend.page.index');
});



Route::prefix('/admin')->group(function () {
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
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        });

        Route::prefix('tags')->group(function () {
            Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
        });

    });
});
