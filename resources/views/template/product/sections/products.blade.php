<div class="single-best-seller-product d-flex align-items-center" data-category="outdoor" data-price="10.99">
    <!-- Your product content here -->
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-md-6 col-lg-3 ftco-animate ">
                    <div class="product">
                        <a href="{{ route('product.single', ['id' => $item->id]) }}" class="img-prod">
                            <img class="img-fluid" src="{{ asset('image/mas/img/' . $item->image1 . '') }}"
                                alt="Product Image" style="width: 255px;height: 255px;">
                        </a>
                        {{-- <span class="status">30%</span> --}}
                        <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{ $item->productName }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>{{ $item->price }}</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{ route('product.single', $id = $item->id) }}"
                                        class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="{{ route('cart', ['id' => $item->id]) }}"
                                        class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
