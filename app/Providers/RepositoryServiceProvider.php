<?php

namespace App\Providers;
use App\Repositories\Category\CategroyRepository;
use App\Repositories\Category\CategroyRepositoryEloquent;
use App\Repositories\LanguageMata\LanguageMetaRepository;
use App\Repositories\LanguageMata\LanguageMetaRepositoryEloquent;
use App\Repositories\MemberBrand\MemberBrandRepository;
use App\Repositories\MemberBrand\MemberBrandRepositoryEloquent;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionRepositoryEloquent;
use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryEloquent;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryEloquent;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryEloquent;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(PostRepository::class, PostRepositoryEloquent::class);
        $this->app->bind(CategroyRepository::class, CategroyRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        $this->app->bind(TagRepository::class, TagRepositoryEloquent::class);
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(MemberBrandRepository::class, MemberBrandRepositoryEloquent::class);
        $this->app->bind(LanguageMetaRepository::class, LanguageMetaRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
