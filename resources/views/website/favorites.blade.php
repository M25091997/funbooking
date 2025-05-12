<x-weblayout>
    <section class="common-bg">
        <div class="common-gradient"></div>
        <div class="container">
            <div class="common-content">
                <h2>My Favorites Park</h2>
            </div>
        </div>
    </section>
    <section class="wishlist-section myBussiness-section">
        <div class="container">
            <div class="headline">
                <h2> My Favorites </h2>
            </div>
            <div class="wishlist-content">
                @if (collect($favorites)->isNotEmpty())
                    <div class="row">
                        @foreach ($favorites as $favorite)
                            <div class="col-lg-4">
                                <div class="bussiness-card">
                                    <div class="bussiness-img">
                                        @php
                                            $images = $favorite->park->parkImage->take(2);
                                            $averageRating = $favorite->park->averageRating();
                                            $minPrice = $favorite->park->ticketPrices->min('price');
                                            $maxPrice = $favorite->park->ticketPrices->max('price');
                                            $averageRating = $favorite->park->averageRating();
                                        @endphp

                                        @if ($images->count() >= 2)
                                            <img src="{{ asset('storage/' . $images[0]->path) }}"
                                                alt="{{ $favorite->park->name }}">
                                            <div class="overlay-img">
                                                <img src="{{ asset('storage/' . $images[1]->path) }}"
                                                    alt="{{ $favorite->park->name }}">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="bussiness-card-content">
                                        <ul>
                                            <li>
                                                {{ $favorite->park->category->name }}
                                            </li>
                                            {{-- <li>
                              <i class="fa-solid fa-bed"></i> 3 beds
                           </li> --}}
                                        </ul>
                                        <h5>
                                            {{ $favorite->park->name }}
                                        </h5>
                                        <ul class="mybus-loc">
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </li>
                                            <li>
                                                {{ $favorite->park->district }}, {{ $favorite->park->state }}
                                            </li>
                                        </ul>
                                        <ul class="bussiness-rating">
                                            <li>
                                                <strong>₹{{ number_format($minPrice) }} -
                                                    ₹{{ number_format($maxPrice) }}</strong> <span>/ <i
                                                        class="fa fa-user" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-star"></i> {{ number_format($averageRating, 1) }}
                                                ({{ $favorite->park->reviews->count() }})
                                            </li>
                                        </ul>
                                        <ul style="justify-content: space-evenly">
                                            <li class="more-info">
                                                <a href="{{ route('website.park.details', $favorite->park->slug) }}">
                                                    View Park </a>
                                            </li>
                                            <li class="more-info">
                                                <button type="button" class="removeFavorite-btn"
                                                    data-park="{{ $favorite->park->id }}">Remove</button>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="text-center">
                            <img src="{{ url('images/favorites.gif') }}" alt="favorites"
                                srcset="{{ url('images/favorites.gif') }}">
                            <h4 class="mt-3 mb-2">No favorite parks added.</h4>

                        </div>

                    </div>
                @endif

            </div>
        </div>
    </section>
    <script>
        var favoriteRemoveUrl = "{{ url('favorite/remove') }}";
        let csrfToken = "{{ csrf_token() }}"
    </script>

</x-weblayout>
