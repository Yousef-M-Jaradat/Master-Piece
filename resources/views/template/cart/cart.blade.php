@extends('template.layout.master')
@section('content')
    <div class="hero-wrap hero-bread"
        style="background-image: url('{{ asset('image/mas/img/pexels-tima-miroshnichenko-6508962.jpg') }}')">
        <div class=" container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($cart[5]->price) --}}
                                @if (isset($cart))
                                    @foreach ($cart as $cartItem)
                                        <tr class="text-center">
                                            <td class="product-remove">

                                                <a
                                                    href="{{ route('cart.destroy', isset($cartItem->product) ? $cartItem->product->id : $cartItem['id']) }}"><span
                                                        class="ion-ios-close"></span></a>
                                            </td>
                                            <td class="image-prod">
                                                {{-- @dd( $cartItem['image']) --}}
                                                <div class="img"
                                                    style="background-image: url({{ isset($cartItem->product) ? asset('image/mas/img/' . $cartItem->product->image1 . '') : 'image/mas/img/' . $cartItem['image'] . '' }});">
                                                    {{-- {{ asset('image/mas/img/' . $item->image1 . '') }} --}}

                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <h3>{{ isset($cartItem->product) ? $cartItem->product->name : $cartItem['productname'] }}
                                                </h3>
                                                <p>{{ isset($cartItem->product) ? $cartItem->product->Sdescription : $cartItem['shortdes'] }}
                                                </p>
                                            </td>

                                            <td class="price">
                                                {{ isset($cartItem->product) ? $cartItem->product->price : $cartItem['price'] }}
                                            </td>
                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <div class="quantity" style="display: flex">
                                                        <form method="post"
                                                            action="{{ route('addQuantity', ['id' => isset($cartItem->product)? $cartItem->productId : $cartItem['id']]) }}">
                                                            @method('post')
                                                            @csrf
                                                            <input type="hidden" name="quantity" value="put">
                                                            <button type="submit" name="action"
                                                                value="decrease">-</button>
                                                            <span>{{ isset($cartItem->product)? $cartItem->quantity : $cartItem['quantity'] }}</span>
                                                            <button type="submit" name="action"
                                                                value="increase">+</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total">
                                                {{ $cartItem['quantity'] * (isset($cartItem->product) ? $cartItem->product->price : $cartItem['price']) }}
                                            </td>
                                        </tr><!-- END TR-->
                                        {{-- @endif --}}
                                    @endforeach


                    </div>
                @else
                    <h1>No Product Found</h1>
                    @endif
                    </tbody>

                    </table>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="{{ route('cart.index') }}" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" name="coupon" class="form-control text-left px-3" placeholder="">
                                {{-- <p><button class="btn btn-primary py-3 px-4">Apply Coupon</button></p> --}}
                            </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" name="state" class="form-control text-left px-3" placeholder="">
                            <p><button class="btn btn-primary py-3 px-4">Apply</button></p>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>${{ $total }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>{{ $delivery }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ $total + $delivery }}</span>
                        </p>
                    </div>
                    <p>
                        @auth
                            <a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                        @else
                            <a href="{{ route('login1') }}" class="btn btn-primary py-3 px-4">Login to Checkout</a>
                        @endauth
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            // Define the input field and buttons
            var quantityInput = $('.quantity-input'); // Use a unique class for the input field
            var minusButton = $('.quantity-left-minus');
            var plusButton = $('.quantity-right-plus');

            // Handle minus button click
            minusButton.click(function() {
                var currentValue = parseInt(quantityInput.val());
                if (currentValue > 1) {
                    quantityInput.val(currentValue - 1);
                }
            });

            // Handle plus button click
            plusButton.click(function() {
                var currentValue = parseInt(quantityInput.val());
                quantityInput.val(currentValue + 1);
            });
        });
    </script>

@endsection
