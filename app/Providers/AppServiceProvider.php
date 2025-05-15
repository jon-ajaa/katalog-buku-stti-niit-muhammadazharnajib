<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public const HOME = '/';
    public function boot(): void{
        \Illuminate\Support\Facades\Route::middleware('web')
            ->group(function () {
            \Illuminate\Support\Facades\Auth::viaRequest('custom', function ($request) {
                return \App\Models\User::where('email', $request->email)->first();
            });
        });
    }
}
