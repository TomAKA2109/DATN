<?php

namespace App\Providers;

use App\View\Composers\MainMenuComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

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
        View::composer('page.header', function ($view) {
            $cart = Session::get('cart');
            $product_cart = $cart ? $cart->items : [];
            $totalQty = $cart ? $cart->totalQty : 0;
            $totalPrice = $cart ? $cart->totalPrice : 0;

            $view->with([
                'product_cart' => $product_cart,
                'totalQty' => $totalQty,
                'totalPrice' => $totalPrice,
            ]);
        });

        View::composer('*', MainMenuComposer::class);
    }
}
