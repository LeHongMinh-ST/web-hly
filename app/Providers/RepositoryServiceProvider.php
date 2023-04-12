<?php

namespace App\Providers;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryEloquent;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\ContactRepositoryEloquent;
use App\Repositories\GroupPermission\GroupPermissionRepository;
use App\Repositories\GroupPermission\GroupPermissionRepositoryEloquent;
use App\Repositories\ReportViewPage\ReportViewPageRepository;
use App\Repositories\ReportViewPage\ReportViewPageRepositoryEloquent;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Setting\SettingRepositoryEloquent;
use App\Repositories\LanguageMeta\LanguageMetaRepository;
use App\Repositories\LanguageMeta\LanguageMetaRepositoryEloquent;
use App\Repositories\MemberBrand\MemberBrandRepository;
use App\Repositories\MemberBrand\MemberBrandRepositoryEloquent;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionRepositoryEloquent;
use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryEloquent;
use App\Repositories\Recruitment\RecruitmentRepository;
use App\Repositories\Recruitment\RecruitmentRepositoryEloquent;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryEloquent;
use App\Repositories\Slug\SlugRepository;
use App\Repositories\Slug\SlugRepositoryEloquent;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\Supplier\SupplierRepositoryEloquent;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryEloquent;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(PostRepository::class, PostRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        $this->app->bind(TagRepository::class, TagRepositoryEloquent::class);
        $this->app->bind(SlugRepository::class, SlugRepositoryEloquent::class);
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(MemberBrandRepository::class, MemberBrandRepositoryEloquent::class);
        $this->app->bind(LanguageMetaRepository::class, LanguageMetaRepositoryEloquent::class);
        $this->app->bind(SettingRepository::class, SettingRepositoryEloquent::class);
        $this->app->bind(RecruitmentRepository::class, RecruitmentRepositoryEloquent::class);
        $this->app->bind(GroupPermissionRepository::class, GroupPermissionRepositoryEloquent::class);
        $this->app->bind(ReportViewPageRepository::class, ReportViewPageRepositoryEloquent::class);
        $this->app->bind(ContactRepository::class, ContactRepositoryEloquent::class);
        $this->app->bind(SupplierRepository::class, SupplierRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
