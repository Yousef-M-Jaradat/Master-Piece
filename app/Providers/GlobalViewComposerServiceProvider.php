<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\carts;
use Illuminate\Support\Facades\View;
class GlobalViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (auth()->user()) {
                $iduser = auth()->user()->id;
                $cart = Carts::where('customerId', $iduser)->with('product')->get();
                $items = count($cart);
            } else {
                $cart = session('cart');
                if($cart == null){
                    $items = 0;
                }else{
                    $items = count($cart); 
                    $total = 0;
            foreach ($cart as $cartItem) {
                $total += $cartItem['quantity'] * (isset($cartItem->product) ? $cartItem->product->price : $cartItem['price']);
            }
                }
            }



            // Share $items and $total with all views
            $view->with('items', $items);
            // ->with('total', $total);
        });
    }
}
