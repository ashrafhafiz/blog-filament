<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use io3x1\FilamentUser\Resources\UserResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Model::unguard();
//
//        Filament::serving(function (){
//            Filament::registerUserMenuItems([
//                // UserMenuItem::make()->label('Your Profile')->url(UserResource::getUrl('edit', ['record' => auth()->user()]))->icon('heroicon-s-user'),
//                'account' => UserMenuItem::make()->label('Your Profile')->url(UserResource::getUrl('edit', ['record' => auth()->user()]))->icon('heroicon-s-user'),
//                UserMenuItem::make()->label('Manage Users')->url(UserResource::getUrl())->icon('heroicon-s-users')
//            ]);
//        });
    }
}
