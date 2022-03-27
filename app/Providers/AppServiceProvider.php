<?php

namespace App\Providers;

use App\Models\{
    Device,
    Game,
    Locator,
    Permission,
    Role,
    User
};
use App\Observers\{
    DeviceObserver,
    GameObserver,
    LocatorObserver,
    PermissionObserver,
    RoleObserver,
    UserObserver
};
use Illuminate\Support\ServiceProvider;

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
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
        Permission::observe(PermissionObserver::class);
        Game::observe(GameObserver::class);
        Device::observe(DeviceObserver::class);
        Locator::observe(LocatorObserver::class);
    }
}
