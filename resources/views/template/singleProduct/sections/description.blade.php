<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate" class="main_image">
                <a href="../mas/img/nursery2.PNG"><img src="{{ asset('image/mas/img/' . $product->image1 . '') }}"
                        id="main_product_image" class="img-fluid" alt="Colorlib Template"></a>
                <div class="thumbnail_images">
                    <ul id="thumbnail">
                        <li><img onclick="changeImage(this)" src="{{ asset('image/mas/img/' . $product->image1 . '') }}"
                                width="70">
                        </li>
                        <li><img onclick="changeImage(this)" src="{{ asset('image/mas/img/' . $product->image2 . '') }}"
                                width="70">
                        </li>
                        <li><img onclick="changeImage(this)" src="{{ asset('image/mas/img/' . $product->image3 . '') }}"
                                width="70">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $product->productName }}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span
                                style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span
                                style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                {{-- @dd(session('cart') ) --}}
                {{-- @dd(session('cart')) --}}

                <p class="price"><span>{{ $product->price }}</span></p>
                <p>{{ $product->Ldescription }}</p>
                <form action="{{ route('cart', ['id' => $product->id]) }}">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Small</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <div class="quantity" style="display: flex">

                                <span class="qty-minus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><button
                                        class="btn btn-default btn-number"><i class="fa fa-minus"
                                            aria-hidden="true"></i></button></span>
                                <input type="number" class="qty-text form-control input-number" id="qty"
                                    step="1" min="1" max="12" name="quantity" value="1" />
                                <span class="qty-plus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><button
                                        class="btn btn-default btn-number"><i class="fa fa-plus"
                                            aria-hidden="true"></i></button></span>
                            </div>
                            {{-- <button type="submit" name="addtocart" value="5" class="btn alazea-btn ml-15">
                                Add to cart
                            </button>
                </form> --}}

            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
                <p style="color: #000;">600 kg available</p>
            </div>
        </div>
        <input type="submit" class="btn btn-black py-3 px-5" Add to Cart>
        {{-- <p><a href="{{ route('cart', ['id' => $product->id]) }}" class="btn btn-black py-3 px-5">Add to Cart</a></p> --}}
        </form>
    </div>
    </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.quantity-right-plus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());

            // Increment
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());

            // Decrement if greater than 0
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>
<script>
    function changeImage(element) {

        var main_prodcut_image = document.getElementById('main_product_image');
        main_prodcut_image.src = element.src;


    }
</script>
