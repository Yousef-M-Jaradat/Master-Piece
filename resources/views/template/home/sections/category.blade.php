<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <h2>Category</h2>
        <div class="row">
        @foreach ($category as $index => $item)
                @if ($index % 2 === 0)
        </div> <!-- Close the previous row -->
        <div class="row"> <!-- Start a new row for every two categories -->
            @endif

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('shop', $item->id) }}">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                style="background-image: url('{{ 'images/category/'.$item->image }}');">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0">{{ $item->categoryName }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
