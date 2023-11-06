<?php

namespace App\Http\Controllers;

use App\Models\shipments;
use App\Models\orders;
use App\Models\orderItems;
use App\Models\payments;
// use App\Models\orderItems;
use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = auth()->user()->id;
        if (auth()->user()) {
            return view('template.checkout.checkout');
        } else {
            return redirect()->back()->with('you have to login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iduser = auth()->user()->id;
        $user = auth()->user();
        $cart = Carts::where('customerId', $iduser)->with('product')->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }

        // dd($totalPrice);
        $shipment = shipments::create([
            'customerId' => auth()->user()->id,
            'shipmentDate' => now()->format('Y-m-d'),
            'country' => $request->country,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
        ]);













        if (isset($request->paypal)) {
            // dd($request->paypal);
            // dd($totalPrice);
            $payment = payments::create([

                "date" => now()->format('Y-m-d'),
                "maethod" => $request->paypal,
                "paymentTotal" => $totalPrice,
                "customerId" => Auth::user()->id,
            ]);
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $PaypalToken = $provider->getAccessToken();


            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" =>  route('paypal_success'),
                    "cancel_url" => route('paypal_cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $totalPrice
                        ]
                    ]
                ]
            ]);




            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {

                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal_cancel');
            }
        } else if (isset($request->cash)) {
            $payment = payments::create([
                "date" => now()->format('Y-m-d'),
                "maethod" => $request->cash,
                "paymentTotal" => $totalPrice,
                "customerId" => Auth::user()->id,
            ]);



            $order = orders::create([
                'orderDate' => now()->format('Y-m-d'),
                'customerId' => auth()->user()->id,
                'totalPrice' => $totalPrice,
                'shipmentId' => $shipment->id,

            ]);

            $cart = carts::where("customerId", $user->id)->get();

            // dd($cart);
            foreach ($cart as $item) {
                orderItems::create([
                    'customerId' => auth()->user()->id,
                    'orderId' => $order->id,
                    'productId' => $item->productId,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            carts::where('customerId', $iduser)->delete();

        }
        // session()->flash('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');

        return redirect()->route('home')->with('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');

















        // $order = orders::create([
        //     'orderDate' => now()->format('Y-m-d'),
        //     'customerId' => auth()->user()->id,
        //     'totalPrice' => $totalPrice,
        //     'shipmentId' => $shipment->id,

        // ]);

// dd($item->product);
        // foreach ($cart as $item){
        //     orderItems::create([
        //         'customerId' => auth()->user()->id,
        //         'orderId' => $order->id,
        //         'productId' => $item->productId,
        //         'quantity' => $item->quantity,
        //         'price' => $item->product->price,
        // ]);
        // }

        // carts::where('customerId', $iduser)->delete();
        


        // return redirect()->route('home');
    }






    public function success(Request $request)
    {


        $iduser = auth()->user()->id;
        $shipment = shipments::where('customerId', $iduser)->latest()->first();

        $user = auth()->user();
        $cart = Carts::where('customerId', $iduser)->with('product')->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $PaypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = orders::create([
                'orderDate' => now()->format('Y-m-d'),
                'customerId' => auth()->user()->id,
                'totalPrice' => $totalPrice,
                'shipmentId' => $shipment->id,

            ]);

            $cart = carts::where("customerId", Auth::user()->id)->get();

            // dd($cart);
            foreach ($cart as $item) {
                orderItems::create([
                    'customerId' => auth()->user()->id,
                    'orderId' => $order->id,
                    'productId' => $item->productId,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            carts::where('customerId', $iduser)->delete();


            return redirect()->route('home')->with('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel()
    {
        return redirect()->route('contact');
    }












    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function show(shipments $shipments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function edit(shipments $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shipments $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipments  $shipments
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipments $shipments)
    {
        //
    }
}
