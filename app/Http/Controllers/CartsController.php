<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\coupons;
use App\Models\products;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Ncart = [];

        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $cart = Carts::where('customerId', $iduser)->with('product')->get();

            foreach ($cart as $item) {
                array_push($Ncart, $item->productId);
            }

            $items = count($Ncart);
        } else {
            $cart = session('cart');
        }

        $coupon = coupons::where('couponName', $request->coupon)->first();

        if ($cart != null) {
            $total = 0;

            foreach ($cart as $cartItem) {
                $total += $cartItem['quantity'] * (isset($cartItem->product) ? $cartItem->product->price : $cartItem['price']);
            };
            if ($coupon) {
                $total = (float)($total-($total * $coupon->discount)) ;
            }
        } else {
            $total = 0;
        }
        // $state = Str::lower($request->state);
        // dd($request->state);

        $delivery = ($request->state === 'amman') ? 3 : 1;

        return view('template.cart.cart', compact('cart', 'total', 'delivery'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $productId = $product->id;
            $quantity = isset($request->quantity) ? $request->quantity : 1;

            // Check if the product already exists in the cart
            $existingCart = Carts::where('customerId', $iduser)
                ->where('productId', $productId)
                ->first();

            if ($existingCart) {
                // Product already exists in the cart, so increment the quantity
                $existingCart->update([
                    'quantity' => $existingCart->quantity + $quantity
                ]);
            } else {
                // Product does not exist in the cart, so create a new record
                Carts::create([
                    'customerId' => $iduser,
                    'productId' => $productId,
                    'quantity' => $quantity
                ]);
            }
        } else {
            $sessioncart = session()->get('cart', []);
            if (isset($sessioncart[$id])) {

                $sessioncart[$id]['quantity'] += isset($request->quantity) ? $request->quantity : 1;

                session()->put('cart', $sessioncart);
            } else {
                $sessioncart[$id] = [
                    'id' => $id,
                    'productId' => $product->id,
                    'productname' => $product->productName,
                    'shortdes' => $product->Sdescription,
                    'quantity' => isset($request->quantity) ? $request->quantity : 1,
                    'image' => $product->image1,
                    'price' => $product->price,

                ];
            }
            session()->put('cart', $sessioncart);
        }


        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (auth()->user()) {
            $cart = carts::all();
            carts::where('productId', $id)->delete();
        } else {
            // dd($id);
            $cart = session('cart');
            // dd($cart[$id]['id']);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function addQuantity(Request $request, $id)
    {
        // Get the action (increase or decrease) from the form
        $action = $request->input('action');

        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $userCart = Carts::where('customerId', $iduser)->where('productId', $id)->first();
                // dd($id);
                // Increase or decrease the quantity based on the action
                if ($action === 'increase') {
                    
                    $userCart->quantity += 1;
                // dd($userCart->quantity);
                $userCart->save(); // Save the updated cart item

                } elseif ($action === 'decrease') {
                    $userCart->quantity -= 1;
                $userCart->quantity = max(1, $userCart->quantity);

                // Make sure the quantity is never less than 1
                // $userCart->quantity = max(1, $userCart->quantity);

                
                $userCart->save(); // Save the updated cart item
            }
            return redirect()->back();
        } else {
            $sessioncart = session()->get('cart', []);

            if (isset($sessioncart[$id])) {
                // Increase or decrease the quantity based on the action
                if ($action === 'increase') {
                    $sessioncart[$id]['quantity'] += 1;
                    session()->put('cart', $sessioncart);
                } elseif ($action === 'decrease') {
                    $sessioncart[$id]['quantity'] -= 1;
                    $sessioncart[$id]['quantity'] = max(1, $sessioncart[$id]['quantity']);
                    session()->put('cart', $sessioncart);

                }


                return redirect()->back(); // Replace 'fallback.route' with your desired route
            }
        }

        // Handle cases where the user is not authenticated or the cart item doesn't exist
    }


}
