<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Repositories\Interfaces\BlogPostRepositoryInterface; 
use App\Repositories\BaseRepository; 
use App\Repositories\BlogPostRepository; 

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BlogPostRepositoryInterface::class, BlogPostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
