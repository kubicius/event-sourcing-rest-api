<?php

namespace App\Providers;

use App\Repositories\Interfaces\IPartnerRepository;
use App\Repositories\PartnerRepository;
use App\Services\Interfaces\IPartnerService;
use App\Services\PartnerService;
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
        $this->app->bind(IPartnerRepository::class, PartnerRepository::class);
        $this->app->bind(IPartnerService::class, PartnerService::class);
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
