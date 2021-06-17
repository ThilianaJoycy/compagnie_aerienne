<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\ReservationRepositoryInterface', 
            'App\Repositories\ReservationRepository'
        ); 

        $this->app->bind(
            'App\Repositories\VolRepositoryInterface', 
            'App\Repositories\VolRepository',
        );
        $this->app->bind(
            'App\Repositories\AeroportRepositoryInterface', 
            'App\Repositories\AeroportRepository'
        );
        $this->app->bind(
            'App\Repositories\EscaleRepositoryInterface', 
            'App\Repositories\EscaleRepository'
        );

        $this->app->bind(
            'App\Repositories\ClientRepositoryInterface', 
            'App\Repositories\ClientRepository'
        );
        $this->app->bind(
            'App\Repositories\PassagerRepositoryInterface', 
            'App\Repositories\PassagerRepository'
        );
        //
    }
}