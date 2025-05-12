<x-weblayout>
    <x-banner :bannerimages="$bannerimages" />

    <section class="myBussiness-section">
        <div class="container">
            <div class="headline">
                <h2>Feature Parks</h2>
            </div>
            <div class="owl-carousel owl-theme" id="outer-mybussiness">
                @foreach ($featureParks as $park)
                    <div class="item">

                        <div class="bussiness-card">
                            <div class="bussiness-img">
                                {{-- Show the first two images --}}
                                @php
                                    $images = $park->parkImage->take(2);
                                    $averageRating = $park->averageRating();
                                    $minPrice = $park->ticketPrices->min('price');
                                    $maxPrice = $park->ticketPrices->max('price');
                                    $averageRating = $park->averageRating();
                                @endphp

                                @if ($images->count() >= 2)
                                    <img src="{{ asset('storage/' . $images[0]->path) }}" alt="{{ $park->name }}"
                                        style="width:317px; height:317px;">
                                    <div class="overlay-img">
                                        <img src="{{ asset('storage/' . $images[1]->path) }}" alt="{{ $park->name }}"
                                            style="width:317px; height:317px;">
                                    </div>
                                    <div class="bussiness-heart">
                                        <button class="addToFavorite-btn" data-park="{{ $park->id }}">
                                            @if (auth()->user() && $park->isFavorited())
                                                {{-- <i class='fa fa-heart' style='color: red'></i> --}}
                                                <i class='fa-solid fa-heart'></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif


                                        </button>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('website.park.details', $park->slug) }}">
                                <div class="bussiness-card-content">
                                    <ul>
                                        <li>
                                            {{ $park->category->name }}
                                        </li>
                                        {{-- <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li> --}}
                                    </ul>
                                    <h6>
                                        {{ $park->name }}
                                    </h6>
                                    <ul class="mybus-loc">
                                        <li>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </li>
                                        <li>
                                            {{ $park->district }}, {{ $park->state }}
                                        </li>
                                    </ul>
                                    <ul class="bussiness-rating">
                                        <li>
                                            <strong>₹{{number_format($minPrice)}} - ₹{{number_format($maxPrice)}}</strong> <span>/ <i class="fa fa-user" aria-hidden="true"></i></span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i> {{ number_format($averageRating, 1) }}
                                            ({{ $park->reviews->count() }})
                                        </li>
                                    </ul>
                                </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="offer-section">
        <div class="container">
            <div class="offer-banner">
                <img src="./images/offers-banner.webp" alt="">
            </div>
            <div class="offer-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="today-tab" data-bs-toggle="tab"
                            data-bs-target="#today-tab-pane" type="button" role="tab"
                            aria-controls="today-tab-pane" aria-selected="true">Today's Offers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="exclusive-tab" data-bs-toggle="tab"
                            data-bs-target="#exclusive-tab-pane" type="button" role="tab"
                            aria-controls="exclusive-tab-pane" aria-selected="false">CD Exclusive</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="people-tab" data-bs-toggle="tab" data-bs-target="#people-tab-pane"
                            type="button" role="tab" aria-controls="people-tab-pane" aria-selected="false">Pople
                            are currently using</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="today-tab-pane" role="tabpanel"
                        aria-labelledby="today-tab" tabindex="0">
                        <div class="offer-slider">
                            <div class="owl-carousel owl-theme" id="bestoffer">
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/amazon.png" alt="amazon logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Brand</h3>
                                        <h5>Upto 7% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/flipcart.png" alt="flipcart logo">
                                        <h3>60% Off On Watch</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/jio.png" alt="jio logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="exclusive-tab-pane" role="tabpanel"
                        aria-labelledby="exclusive-tab" tabindex="0">
                        <div class="offer-slider">
                            <div class="owl-carousel owl-theme" id="cd-exclusive">
                                <div class="item">
                                    <div class="offer-card">
                                        <div class="inner-offer">
                                            <img src="./images/amazon.png" alt="amazon logo">
                                            <h3>60% Off On Beauty</h3>
                                            <h5>Flat 3.6% voucher Rewards</h5>
                                            <div class="get-deal">
                                                <a href="#">Get Deal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Upto 7% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/flipcart.png" alt="flipcart logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/jio.png" alt="jio logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="people-tab-pane" role="tabpanel" aria-labelledby="people-tab"
                        tabindex="0">
                        <div class="offer-slider">
                            <div class="owl-carousel owl-theme" id="popleoffer">
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/amazon.png" alt="amazon logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Upto 7% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/flipcart.png" alt="flipcart logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/jio.png" alt="jio logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="offer-card">
                                        <img src="./images/myntra.png" alt="myntra logo">
                                        <h3>60% Off On Beauty</h3>
                                        <h5>Flat 3.6% voucher Rewards</h5>
                                        <div class="get-deal">
                                            <a href="#">Get Deal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- promotional Posters --}}
    <section class="big-offer">
        <div class="container">
            <div class="owl-carousel owl-theme" id="bigOffer">
                @foreach($discounts as $discount)
                <div class="item">
                    <div class="coupon-card">
                        <div class="coupon">
                            <h2>{{$discount->discountType->name}}</h2>
                            <p>{!! $discount->name !!}</p>
                            <p>Use Code:</p>
                            <input type="text"  class="code" id="discountCode" value="{{ $discount->code }}" readonly style=" border: none; text-align:center; width:70%">
                            {{-- <div class="code" style="user-select: all;">{{ $discount->code }}</div> --}}
                            <p>Valid till: {{ \Carbon\Carbon::parse($discount->valid_until)->format('d M Y') }} </p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="item">
                    <div class="coupon-card">
                        <div class="coupon">
                            <h2>Water Park Discount</h2>
                            <p>Get 20% off on your next visit!</p>
                            <p>Use Code:</p>
                            <div class="code">WATER20</div>
                            <p>Valid till: 28th Feb 2025</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="coupon-card">
                        <div class="coupon">
                            <h2>Water Park Discount</h2>
                            <p>Get 20% off on your next visit!</p>
                            <p>Use Code:</p>
                            <div class="code">WATER20</div>
                            <p>Valid till: 28th Feb 2025</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="coupon-card">
                        <div class="coupon">
                            <h2>Water Park Discount</h2>
                            <p>Get 20% off on your next visit!</p>
                            <p>Use Code:</p>
                            <div class="code">WATER20</div>
                            <p>Valid till: 28th Feb 2025</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="offersec">
        <div class="container">
            <div class="offimg-content">
                <div class="row">
                    @foreach ($promotionalPosters as $poster)
                        <div class="col-lg-6">
                            <div class="big-offer-img">
                                <a href="{{ $poster->link ?? 'javascript:0' }}"> <img
                                        src="{{ asset('storage/' . $poster->image) }}" alt="{{ $poster->title }}"
                                        style="width:638px; height:298px"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="faq-section">
        <div class="container">
            <div class="faq-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="faq-image">
                            <img src="./images/waterpark.webp" alt="faq image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-content-sec">
                            <div class="headline">
                                <h2>Frequently asked questions</h2>
                            </div>
                            <div class="right-faq">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($faqs as $key => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#faqSection{{ $faq->id }}"
                                                    aria-expanded="true" aria-controls="referOne">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="faqSection{{ $faq->id }}"
                                                class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- subscriptions section --}}
    <section class="subscribe-section">
        <div class="container">
            <div class="subscribe-content">
                <div class="owl-carousel owl-theme" id="subscriptions">
                    @foreach ($subscriptions as $plan)
                        <div class="item">
                            <div class="subscribe-card side-package">
                                <h3>{{ $plan->name }} </h3>
                                <h4>₹<span> {{ $plan->price }}</span>/{{ $plan->duration_days }} Days</h4>
                                <ul>
                                    @foreach ($plan->benefits as $benefit)
                                        <li>
                                            {{ $benefit->name }}
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="more-info">
                                    <a href="booking.php">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <x-testimonials :testimonials="$testimonials" />

    <script>
        var favoriteToggleUrl = "{{ url('favorite/toggle') }}";
        let csrfToken = "{{ csrf_token() }}"
    </script>

</x-weblayout>
