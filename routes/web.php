<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RecruitmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
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

Route::multilingual('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/gioi-thieu')->group(function () {
    Route::multilingual('/', function () {
        return view('cms.page.introduce');
    })->name('cms.about');
    Route::multilingual('/doi-ngu-nhan-su', function () {
        return view('cms.page.info.humanResourcesTeam');
    })->name('cms.about.activity');
    Route::multilingual('/tam-nhin-su-menh-va-gia-tri-cot-loi', function () {
        return view('cms.page.info.coreValues');
    })->name('cms.about.coreValues');
    Route::multilingual('/doi-voi-khach-hang', function () {
        return view('cms.page.info.forCustomers');
    })->name('cms.about.forCustomers');
});

Route::prefix('/linh-vuc-hoat-dong')->group(function () {
    Route::multilingual('/', function () {
        return view('cms.page.fieldOperation.activity');
    })->name('cms.fieldOperation');
    Route::multilingual('/cong-nghe-xanh', function () {
        return view('cms.page.fieldOperation.activity');
    })->name('cms.fieldOperation.activity');
    Route::multilingual('/thuong-mai-dich-vu', function () {
        return view('cms.page.fieldOperation.serviceCommerce');
    })->name('cms.fieldOperation.serviceCommerce');
    Route::multilingual('/nam-y-va-cham-soc-suc-khoe', function () {
        return view('cms.page.fieldOperation.medicineHealthcare');
    })->name('cms.fieldOperation.medicineHealthcare');
    Route::multilingual('/thuc-pham-xanh', function () {
        return view('cms.page.fieldOperation.greenTechnology');
    })->name('cms.fieldOperation.greenTechnology');
});


Route::multilingual('/phat-trien-ben-vung', function () {
    return view('cms.page.sustainableDevelopment');
})->name('cms.sustainableDevelopment');

Route::get('/he-sinh-thai/suc-khoe', function () {
    return view('cms.page.ecosystem.health');
})->name('cms.ecosystem');

Route::multilingual('/tin-tuc-su-kien', [HomeController::class, 'postPage'])->name('cms.news');
Route::multilingual('/tin-tuc-su-kien/bai-viet/{slug}', [BlogController::class, 'getPost'])->name('cms.news.post');
Route::multilingual('/lien-he', function () {
    return view('cms.page.contact');
})->name('cms.contact');
Route::multilingual('/tim-kiem', function () {
    return view('cms.page.search');
})->name('cms.search');
Route::multilingual('/tuyen-dung', function () {
    return view('cms.page.recruitment');
})->name('cms.recruitment');
Route::multilingual('/nha-dau-tu', [HomeController::class, 'investors'])->name('cms.investors');
Route::multilingual('/nha-dau-tu/{slug}', function () {
    return view('cms.page.info.forCustomers');
})->name('cms.info.forCustomers');


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
                Route::get('/', [UserController::class, 'index'])->name('admin.users.index')->middleware('permission:user-index');
                Route::get('/create', [UserController::class, 'create'])->name('admin.users.create')->middleware('permission:user-create');
                Route::post('/', [UserController::class, 'store'])->name('admin.users.store')->middleware('permission:user-create');
                Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show')->middleware('permission:user-update');
                Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update')->middleware('permission:user-update');
                Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy')->middleware('permission:user-delete');
            });

            Route::prefix('roles')->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');
                Route::post('/', [RoleController::class, 'store'])->name('admin.roles.store');
                Route::get('/create', [RoleController::class, 'create'])->name('admin.roles.create');
                Route::get('/{id}', [RoleController::class, 'show'])->name('admin.roles.show');
                Route::put('/{id}', [RoleController::class, 'update'])->name('admin.roles.update');
                Route::delete('/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
                Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
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
            Route::prefix('settings')->group(function () {
                Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
                Route::post('/', [SettingController::class, 'update'])->name('admin.settings.update');
            });

            Route::prefix('recruitments')->group(function () {
                Route::get('/', [RecruitmentController::class, 'index'])->name('admin.recruitments.index');
                Route::post('/', [RecruitmentController::class, 'store'])->name('admin.recruitments.store');
                Route::get('/create', [RecruitmentController::class, 'create'])->name('admin.recruitments.create');
                Route::get('/{id}', [RecruitmentController::class, 'show'])->name('admin.recruitments.show');
                Route::put('/{id}', [RecruitmentController::class, 'update'])->name('admin.recruitments.update');
                Route::delete('/{id}', [RecruitmentController::class, 'destroy'])->name('admin.recruitments.destroy');
                Route::get('/{id}/edit', [RecruitmentController::class, 'edit'])->name('admin.recruitments.edit');
            });

            Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
                Lfm::routes();
            });
        });
    });
});
