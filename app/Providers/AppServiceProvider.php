<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DesignationRepositoryInterface;
use App\Repositories\DesignationRepository;
use App\Repositories\EmployeeRepositoryInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\HotelCategoryRepositoryInterface;
use App\Repositories\HotelCategoryRepository;
use App\Repositories\HotelRepositoryInterface;
use App\Repositories\HotelRepository;
use App\Repositories\PackageRepositoryInterface;
use App\Repositories\PackageRepository;
use App\Repositories\DestinationRepositoryInterface;
use App\Repositories\DestinationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DesignationRepositoryInterface::class, DesignationRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(HotelCategoryRepositoryInterface::class, HotelCategoryRepository::class);
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(DestinationRepositoryInterface::class, DestinationRepository::class);
        

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
