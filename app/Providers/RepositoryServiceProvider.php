<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Repositories\GroupRepository::class, \App\Repositories\Eloquent\GroupRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\ROleRepository::class, \App\Repositories\Eloquent\ROleRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\RoleRepository::class, \App\Repositories\Eloquent\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\BookRepository::class, \App\Repositories\Eloquent\BookRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TestRepository::class, \App\Repositories\Eloquent\TestRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\UserTestRepository::class, \App\Repositories\Eloquent\UserTestRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\EntertainmentRepository::class, \App\Repositories\Eloquent\EntertainmentRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\CategoryLessonRepository::class, \App\Repositories\Eloquent\CategoryLessonRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\LessonRepository::class, \App\Repositories\Eloquent\LessonRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TestLessonRepository::class, \App\Repositories\Eloquent\TestLessonRepositoryEloquent::class);
        //:end-bindings:
    }
}
