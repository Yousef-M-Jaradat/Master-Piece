<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="{{route('allProduct')}}" class="active">All</a></li>
                    @foreach ($category as $item )                        
                    <li><a href="{{route('shop',$item->id)}}">{{$item->categoryName}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
  {{-- <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">
                        <!-- Shop Widget -->
                        <div class="shop-widget price mb-50">
                            <h4 class="widget-title">Prices</h4>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="8" data-max="30" data-unit="$"
                                        class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                        data-value-min="8" data-value-max="30" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all first-handle"
                                            tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: $8 - $30</div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                    <label class="custom-control-label" for="customCheck1">All plants <span
                                            class="text-muted">(72)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                    <label class="custom-control-label" for="customCheck2">Outdoor plants
                                        <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" />
                                    <label class="custom-control-label" for="customCheck3">Indoor plants <span
                                            class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" />
                                    <label class="custom-control-label" for="customCheck4">Office Plants <span
                                            class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5" />
                                    <label class="custom-control-label" for="customCheck5">Potted <span
                                            class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6" />
                                    <label class="custom-control-label" for="customCheck6">Others <span
                                            class="text-muted">(2)</span></label>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" />
                                    <label class="custom-control-label" for="customCheck7">New arrivals</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8" />
                                    <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9" />
                                    <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10" />
                                    <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11" />
                                    <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Seller</h4>
                            <div class="widget-desc">
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/4.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Cactus Flower</a>
                                        <p>$10.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/5.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Tulip Flower</a>
                                        <p>$11.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/34.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Recuerdos Plant</a>
                                        <p>$9.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script>
    // Wait for the DOM to be ready
    $(document).ready(function() {
        // Function to filter products based on selected categories and price range
        function filterProducts() {
            var selectedCategories = [];
            // Get selected category checkboxes
            $("input[type='checkbox']:checked").each(function() {
                selectedCategories.push($(this).val());
            });

            var minPrice = $("#slider-range-price").slider("values", 0);
            var maxPrice = $("#slider-range-price").slider("values", 1);

            // Hide all products
            $(".single-best-seller-product").hide();

            // Filter products based on categories and price
            $(".single-best-seller-product").each(function() {
                var productCategory = $(this).data("category");
                var productPrice = parseFloat($(this).data("price"));

                if ((selectedCategories.length === 0 || selectedCategories.includes(productCategory)) &&
                    (productPrice >= minPrice && productPrice <= maxPrice)) {
                    $(this).show();
                }
            });
        }

        // Initialize the price range slider
        $("#slider-range-price").slider({
            range: true,
            min: 8,
            max: 30,
            values: [8, 30],
            slide: function(event, ui) {
                $("#range-price").html("$" + ui.values[0] + " - $" + ui.values[1]);
            },
            change: function(event, ui) {
                filterProducts();
            }
        });

        // Handle checkbox change events
        $("input[type='checkbox']").change(function() {
            filterProducts();
        });

        // Initial filter products
        filterProducts();
    });
</script>  --}}
{{-- <div class="form-search-categories">


                        <form action="{{ route('cat') }}" method="GET">

                            <select name="price_range" id="price_range">
                                <option value="">Any</option>
                                <option value="0-20">0 - 20</option>
                                <option value="21-80">21 - 80</option>
                                <option value="81-150">81 - 150</option>
                                <option value="150-500">150 - 500</option>
                                <option value="501-1000">501 - 1000</option>
                            </select>

                            <button type="submit">Search</button>
                        </form>

                        <div>
                            <form action="{{ route('searchByName') }}" method="GET">

                                <input type="text" name="product_name" id="product_name"
                                    value="{{ request('product_name') }}" placeholder="search">

                                <button type="submit">Search</button>
                            </form>

                        </div>

                    </div> --}}
