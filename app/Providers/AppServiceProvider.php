<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('stat', [
            'total_user' => \App\User::count(),
            'unactivated_user' => \App\User::where('actived',0)->count(),
            'total_task' => \App\Task::count(),
        ]);
        \Carbon\Carbon::setLocale('vi');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
