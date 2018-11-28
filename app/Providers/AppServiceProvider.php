<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *在启动之后执行
     * @return void
     */
    public function boot()
    {
        //mb4String  767/4 修改laravel默认的string长度
        Schema::defaultStringLength(191);
        //
        \View::composer('layout.sidebar', function($view) {
            $topics = \App\Topic::all();
            $view->with('topics', $topics);
        });
    }

    /**
     * Register any application services.
     * 在启动之前执行
     * @return void
     */
    public function register()
    {
        //
    }
}
