    <x-weblayout>
        <section class="common-bg">
            <div class="common-gradient"></div>
            <div class="container">
                <div class="common-content">
                    <p>{{$images[0]->park->category->name}}</p>
                    <h2>{{$images[0]->park->name}}</h2>
                </div>
            </div>
        </section>
        <section class="gallery-section fun-details">
            <div class="container">
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 p-0 p-1">
                            <div class="gallery-card">
                                <div class="card-image">
                                    <a href="{{ asset('storage/' . $image->path) }}" data-fancybox="gallery"
                                        data-caption="Image Gallery">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Park Image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </x-weblayout>
