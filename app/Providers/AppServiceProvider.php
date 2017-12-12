<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Loaimon;
use App\Cauhinh;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer(['client.layout.menu','client.layout.header'],function($view){
            $cauhinh =Cauhinh::first();
            $logo = $cauhinh->logo;
            $loaimonan = Loaimon::all();
            $view->with(['loaimonan'=>$loaimonan,'logo'=>$logo]);
        });
        view()->composer(['client.layout.footer'],function($view){
            $cauhinh = Cauhinh::first();
            $view->with(['cauhinh'=>$cauhinh]);
        });
        view()->composer(['css.custom'],function($view){
            $cauhinh =Cauhinh::first();
            $maugiaodien = $cauhinh->maugiaodien;
            $view->with(['maugiaodien'=>$maugiaodien]);
        });
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
