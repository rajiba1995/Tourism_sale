<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DesignationRepositoryInterface;
use App\Repositories\DesignationRepository;
use App\Repositories\EmployeeRepositoryInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\HotelCategoryRepositoryInterface;
use App\Repositories\HotelCategoryRepository;

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


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
