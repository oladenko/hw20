<?php

namespace App\Providers;

use App\Service\Geo\GeoService;
use App\Service\Geo\IpApiGeoService;
use App\Service\Geo\MaxmindGeoService;
use Illuminate\Support\ServiceProvider;
use MaxMind\Db\Reader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GeoService::class, function (){
//            return new MaxmindGeoService();
            return new IpApiGeoService();
        });
//        $this->app->singleton(\GeoIp2\Database\Reader::class, function (){
//            return new \GeoIp2\Database\Reader(base_path() . DIRECTORY_SEPARATOR .
//            'database'. DIRECTORY_SEPARATOR . 'geoip'. DIRECTORY_SEPARATOR .
//                'GeoLite2-Country.mmdb'
//            );
//        });
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
