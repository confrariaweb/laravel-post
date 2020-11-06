<?php

namespace ConfrariaWeb\Post\Providers;

use ConfrariaWeb\Post\Contracts\PostCategoryContract;
use ConfrariaWeb\Post\Contracts\PostContract;
use ConfrariaWeb\Post\Contracts\PostSectionContract;
use ConfrariaWeb\Post\Models\Post;
use ConfrariaWeb\Post\Models\PostCategory;
use ConfrariaWeb\Post\Models\PostSection;
use ConfrariaWeb\Post\Observers\PostCategoryObserver;
use ConfrariaWeb\Post\Observers\PostObserver;
use ConfrariaWeb\Post\Observers\PostSectionObserver;
use ConfrariaWeb\Post\Repositories\PostCategoryRepository;
use ConfrariaWeb\Post\Repositories\PostRepository;
use ConfrariaWeb\Post\Repositories\PostSectionRepository;
use ConfrariaWeb\Post\Services\PostCategoryService;
use ConfrariaWeb\Post\Services\PostSectionService;
use ConfrariaWeb\Post\Services\PostService;
use ConfrariaWeb\Vendor\Traits\ProviderTrait;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{

    use ProviderTrait;

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'post');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        //$this->registerSeedsFrom(__DIR__.'/../../databases/Seeds');
        $this->publishes([__DIR__ . '/../../config/cw_post.php' => config_path('cw_post.php')], 'config');

        Post::observe(PostObserver::class);
        PostCategory::observe(PostCategoryObserver::class);
        PostSection::observe(PostSectionObserver::class);
    }

    public function register()
    {
        $this->app->bind(PostSectionContract::class, PostSectionRepository::class);
        $this->app->bind('PostSectionService', function ($app) {
            return new PostSectionService($app->make(PostSectionContract::class));
        });

        $this->app->bind(PostCategoryContract::class, PostCategoryRepository::class);
        $this->app->bind('PostCategoryService', function ($app) {
            return new PostCategoryService($app->make(PostCategoryContract::class));
        });

        $this->app->bind(PostContract::class, PostRepository::class);
        $this->app->bind('PostService', function ($app) {
            return new PostService($app->make(PostContract::class));
        });
    }
}
