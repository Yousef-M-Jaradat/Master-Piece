<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">New Arrivel</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ route('product.single', $id = $item->id) }}" class="img-prod">
                            <img class="img-fluid" src="{{ asset('image/mas/img/' . $item->image1 . '') }}"
                                alt="Image Description" style="width: 255px;height: 255px;
">
                            {{-- <span class="status">30%</span> --}}
                            <div class="overlay"></div>
                        </a>

                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{ $item->productName }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>${{ $item->price }}</span></p>
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
    </div>
</section>
