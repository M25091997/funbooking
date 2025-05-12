<x-weblayout>
    <section class="common-bg">
        <div class="common-gradient"></div>
        <div class="container">
            <div class="common-content">
                <p>Fun Book World</p>
                <h2>GALLERY OF OUR BOOK FUN</h2>
            </div>
        </div>
    </section>
    <section class="gallery-section fun-details">
        <div class="container">
            <div class="row">
                @foreach ($parks as $park)
                    @if ($park->parkImage->isNotEmpty())
                        <div class="col-lg-4 col-md-6 p-0">
                            <div class="gallery-card">
                                <div class="card-image">
                                    <a href="{{ asset('storage/' . $park->parkImage->first()->path) }}"
                                        data-fancybox="gallery" data-caption="Image Gallery">
                                        <img src="{{ asset('storage/' . $park->parkImage->first()->path) }}"
                                            alt="Park Image">
                                        <div class="overlay-gallery">
                                        </div>
                                    </a>
                                    <a href="{{ route('website.gallery', $park->slug) }}">
                                        <div class="caption">
                                            <p>{{ $park->category->name }}</p>
                                            <p>{{ $park->name }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 p-0">
                    <div class="gallery-card">
                        <div class="card-image">
                            <a href="./images/book-1.webp" data-fancybox="gallery" data-caption="Image Gallery">
                                <img src="./images/book-1.webp" alt="Image Gallery">
                                <div class="overlay-gallery">
                                </div>
                                <div class="caption">
                                    <p>Book</p>
                                    <h4>Desk</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</x-weblayout>
