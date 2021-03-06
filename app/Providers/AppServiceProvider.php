<?php

namespace App\Providers;

use App\Models\{
    Device,
    Game,
    Inventory,
    Locator,
    Order,
    Permission,
    Product,
    Reading,
    Report,
    Role,
    User
};
use App\Observers\{
    DeviceObserver,
    GameObserver,
    InventoryObserver,
    LocatorObserver,
    OrderObserver,
    PermissionObserver,
    ProductObserver,
    ReadingObserver,
    ReportObserver,
    RoleObserver,
    UserObserver
};
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
        Permission::observe(PermissionObserver::class);
        Game::observe(GameObserver::class);
        Device::observe(DeviceObserver::class);
        Locator::observe(LocatorObserver::class);
        Reading::observe(ReadingObserver::class);
        Inventory::observe(InventoryObserver::class);
        Order::observe(OrderObserver::class);
        Report::observe(ReportObserver::class);
        Product::observe(ProductObserver::class);
    }
}
