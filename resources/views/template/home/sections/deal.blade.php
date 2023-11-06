<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">Best Price For You</span>
                <h2 class="mb-4">Deal of the day</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                <h3><a href="#">Vegitabels & Fruits</a></h3>
                <span class="price">{{ $discount->discount * 100 }}% discount</a></span>
                <div>
                    @php
                        $fullDate = $discount->ending;
                        $parts = explode(' ', $fullDate);
                        $dateWithoutHour = trim($parts[0]);
                    @endphp
                    @php
                        echo "<b>until </b>".$dateWithoutHour;
                    @endphp
                </div>
            </div>
        </div>
    </div>
</section>
