<x-weblayout>
    @php
        $minPrice = $park->ticketPrices->min('price');
        $maxPrice = $park->ticketPrices->max('price');
        $averageRating = $park->averageRating();
    
        $allDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $closingDays = json_decode($park->closing_days, true) ?? [];

        // Get open days by excluding closing days
        $openDays = array_values(array_diff($allDays, $closingDays));

        // dd($openDays);

        // Get first and last open days
        $firstDay = reset($openDays);
        $lastDay = end($openDays);

    @endphp

    <section class="common-bg">
        <div class="common-gradient"></div>
        <div class="container">
            <div class="common-content">
                <p>{{ $park->category->name }}</p>
                <h2>{{ $park->name }}</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="fun-details-section">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="fun-detail-card">
                            <div class="slider-conetnt">
                                <div class="owl-carousel owl-theme owlSlider" id="sliderDetails">
                                    @foreach ($park->parkImage as $image)
                                        

                                        <div class="item">
                                            <div class="slider-img">
                                                <img src="{{ asset('storage/' . $image->path) }}"
                                                    alt="{{ $park->name }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="detail-cont">
                                    <div class="row">
                                       <div class="col-lg-6 col-8">
                                       <div class="loc-details">
                                             <div class="location-detail">
                                                <i class="fa-solid fa-location-dot"></i>
                                                {{-- <h5>Location</h5> --}}
                                                <p>{{ $park->district }}, {{ $park->state }}</p>
                                             </div>
                                          </div>
                                          <h4>{{ $park->name }}</h4>
                                          <ul class="rating-star">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($averageRating))
                                                    <!-- Full Star -->
                                                    <li>
                                                        <i class="fa-solid fa-star" style="color: gold;"></i>
                                                    </li>
                                                @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                    <!-- Half Star -->
                                                    <li>
                                                        <i class="fa-solid fa-star-half-stroke" style="color: gold;"></i>
                                                    </li>
                                                @else
                                                    <!-- Empty Star -->
                                                    <li>
                                                        <i class="fa-solid fa-star" style="color: gray;"></i>
                                                    </li>
                                                @endif
                                            @endfor
    
                                            <li>({{ $park->reviews->count() }})</li>
                                        </ul>
                                       </div>
                                       <div class="col-lg-6 col-4">
                                          <!-- <div class="loc-details">
                                             <div class="location-detail">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p>Ranchi</p>
                                             </div>
                                          </div> -->
                                          <div class="opning-details">
                                            <h5>Opening Hours</h5> 
                                             <ul>
                                                <li>
                                                    {{ $firstDay }} - {{ $lastDay }}
                                                </li>
                                                <li class="time">
                                                    {{ \Carbon\Carbon::parse($park->opening_time)->format('h:i A') }} -  
                                                    {{ \Carbon\Carbon::parse($park->closing_time)->format('h:i A') }} 
                                                    
                                                </li>
                                             </ul>
                                             @if(!empty($closingDays))
                                             <ul>
                                                <li>
                                                    @foreach($closingDays as $day)
                                                        {{ $day }},
                                                    @endforeach
                                                    : <span class="text-danger">Closed</span>
                                                </li>

                                                {{-- <li>
                                                    @foreach(json_decode($park->closing_days) as $day)
                                                    {{$day}}
                                                    @endforeach
                                                     : <span class="text-danger">Closed</span> 
                                                </li> --}}
                                               
                                             </ul>
                                             @endif
                                             <!-- <div class="tel">
                                                <a href="#">+91-9609670867</a>
                                             </div> -->
                                          </div>
                                       </div>
                                    </div>
                                    <div class="funbookBtn">
                                       <a href="#" class="contacBtn">
                                       <i class="fa-solid fa-phone-volume"></i> {{ $park->helpline }}
                                       </a>
                                    </div>
                                 </div>

                                {{-- <div class="detail-cont">
                                    <h4>{{ $park->name }}</h4>

                                    <ul class="rating-star">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($averageRating))
                                                <!-- Full Star -->
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: gold;"></i>
                                                </li>
                                            @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                <!-- Half Star -->
                                                <li>
                                                    <i class="fa-solid fa-star-half-stroke" style="color: gold;"></i>
                                                </li>
                                            @else
                                                <!-- Empty Star -->
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: gray;"></i>
                                                </li>
                                            @endif
                                        @endfor

                                        <li>({{ $park->reviews->count() }})</li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <a href="#" class="contacBtn">
                                                <i class="fa-solid fa-phone-volume"></i> {{ $park->helpline }}
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="loc-details">
                                                <div class="row">
                                                    <div class="col-lg-1 col-md-1 col-2">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                    </div>
                                                    <div class="col-lg-11 col-md-11 col-10">
                                                        <div class="location-detail">
                                                            <h5>Location</h5>
                                                            <p>{{ $park->district }}, {{ $park->state }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="fun-detail-card">
                            <div class="detail-cont">
                                {!! $park->attraction !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right-card-details">
                            <div class="inner-right-card-details">
                                <div class="card-inn">
                                    <h2>₹{{ number_format($minPrice, 2) }} - ₹{{ number_format($maxPrice, 2) }}</span>
                                    </h2>
                                </div>
                                <div class="card-inn">
                                    <div class="buynow">
                                        <a href="#">Booking Now</a>
                                    </div>
                                    {{-- <div class="add-pro">
                                        <span>
                                            <i class="fa-solid fa-cart-shopping"></i> 247+ bought
                                        </span>
                                    </div> --}}
                                </div>
                                {{-- <div class="card-inn">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="value-card">
                                                <p>Value</p>
                                                <h6>₹310.00</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="value-card">
                                                <p>Discount</p>
                                                <h6>20%</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="value-card">
                                                <p>You Save</p>
                                                <h6>₹35.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card-inn">
                                    <div class="limited-time">
                                        <span>
                                            Time Left - Limited Offer!
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="time-box">
                                                <h4>146</h4>
                                                <span>Day</span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="time-box">
                                                <h4>12</h4>
                                                <span>Hr</span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="time-box">
                                                <h4>45</h4>
                                                <span>Min</span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="time-box">
                                                <h4>20</h4>
                                                <span>Sec</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-card-details">
                            <div class="inshort">
                                <div class="short-head">
                                    <h4>
                                        In Short
                                    </h4>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est laborum.</p>
                                <div class="map-left">
                                    <iframe src="{{ $park->location }}" {{-- src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7324.461399853194!2d85.310152!3d23.37987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e1ff1c55bacd%3A0xbd730f5ae2453d28!2sTripledots%20Software%20Services%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1718364285898!5m2!1sen!2sin" --}} height="250"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="right-card-details">
                            <div class="inshort">
                                <div class="short-head">
                                    <h4>
                                        Address
                                    </h4>
                                </div>
                                <div class="author">
                                    <p> {{ $park->address }} </p>
                                    {{-- <img src="{{ asset('images/user1.jpg') }}" alt="user1.jpg">
                                    <h4>Chris Orwig</h4>
                                    <p>Photographer, Author, Writer</p> --}}
                                    {{-- <div class="contactUs">
                                        <a href="#">Contact With Me</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-section">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="customer-review">
                                <div class="inner-customer-review">
                                    <h5>Customer Reviews</h5>

                                    <ul class="user-rating">

                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($averageRating))
                                                <!-- Full Star -->
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #fcc802;"></i>
                                                </li>
                                            @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                <!-- Half Star -->
                                                <li>
                                                    <i class="fa-solid fa-star-half-stroke" style="color: #fcc802;"></i>
                                                </li>
                                            @else
                                                <!-- Empty Star -->
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: gray;"></i>
                                                </li>
                                            @endif
                                        @endfor


                                        {{-- <li>
                                            <i class="fa-solid fa-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star checked"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star checked"></i>
                                        </li> --}}
                                        <li class="rating-num">
                                            {{ number_format($park->averageRating(), 1) }} out of 5
                                        </li>
                                    </ul>
                                    <p>{{ $park->reviews->count() }} Global Ratings</p>
                                    {{-- <a href="#">
                                        <div class="progress-rating">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="star">
                                                        5 star
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                            aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                            <span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="rating-per">
                                                        59%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="progress-rating">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="star">
                                                        4 star
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:60%">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="rating-per">
                                                        50%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="progress-rating">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="star">
                                                        3 star
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:40%">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="rating-per">
                                                        20%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="progress-rating">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="star">
                                                        2 star
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:30%">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="rating-per">
                                                        20%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="progress-rating">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="star">
                                                        1 star
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:20%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="rating-per">
                                                        10%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> --}}

                                    <!-- </div>
                        <div class="fun-detail-card"> -->
                                    <div class="detail-cont">
                                        {{-- <div class="form-fun-details">
                                            <h5>Add a review</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                <span>*</span></p>
                                            <ul class="user-rating">
                                                <li>
                                                    <i class="fa-solid fa-star" data-value="1"></i>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" data-value="2"></i>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" data-value="3"></i>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" data-value="4"></i>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" data-value="5"></i>
                                                </li>
                                            </ul>
                                            <form action="#">
                                             @csrf
                                             <input type="hidden" value="" id="rating">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 input-text">
                                                            <input type="text" class="form-control" id="name"
                                                                placeholder="Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 input-text">
                                                            <input type="text" class="form-control input-text"
                                                                id="email" placeholder="Email*">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 input-text">
                                                        <textarea class="form-control input-text" id="message" rows="3" placeholder="Your Review"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check input-text-chek">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="invalidCheck" required>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                Save my name, email, and website in this browser for the
                                                                next time I comment.
                                                            </label>
                                                            <div class="invalid-feedback">
                                                                You must agree before submitting.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn SubmitBtn" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}

                                        <div class="form-fun-details">
                                            <h5>Add a review</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                <span>*</span>
                                            </p>

                                            <!-- Rating Selection -->
                                            <ul class="user-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        <i class="fa-solid fa-star rating-star"
                                                            data-value="{{ $i }}"></i>
                                                    </li>
                                                @endfor
                                            </ul>
                                            @error('rating')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif


                                            <form action="{{ route('website.reviews.store', $park->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="rating" id="rating">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 input-text">
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ auth()->user()->name ?? '' }}"
                                                                placeholder="Name*" required>
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 input-text">
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ auth()->user()->email ?? '' }}"
                                                                placeholder="Email*" required>
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 input-text">
                                                        <textarea class="form-control input-text" name="review" rows="3" placeholder="Your Review" required></textarea>
                                                        @error('review')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check input-text-chek">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="invalidCheck" required>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                Save my name and email for future comments.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn SubmitBtn" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- JavaScript for Rating Selection -->
                                        <script>
                                            document.querySelectorAll('.rating-star').forEach(star => {
                                                star.addEventListener('click', function() {
                                                    let rating = this.getAttribute('data-value');
                                                    document.getElementById('rating').value = rating;

                                                    // Highlight selected stars
                                                    document.querySelectorAll('.rating-star').forEach(s => {
                                                        s.classList.toggle('selected', s.getAttribute('data-value') <= rating);
                                                    });
                                                });
                                            });
                                        </script>

                                        <style>
                                            .rating-star {
                                                cursor: pointer;
                                                color: #ddd;
                                            }

                                            .rating-star.selected {
                                                color: gold;
                                            }
                                        </style>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="fun-detail-card review-customer-scroll">
                                <div class="detail-cont">
                                    @foreach ($park->reviews as $review)
                                        <div class="user-review-card">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2">
                                                    <img src="{{ asset('images/user.png') }}" alt="user">
                                                </div>
                                                <div class="col-lg-10 col-md-10">
                                                    <ul class="user-rating">
                                                        @php $rating = $review->rating; @endphp
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <li>
                                                                <i
                                                                    class="fa-solid fa-star {{ $review->rating >= $i ? 'checked' : '' }}"></i>
                                                            </li>
                                                        @endfor
                                                      
                                                    </ul>
                                                    <h6>
                                                        {{ $review->name }}                                                        
                                                    </h6>
                                                    <p>{{ $review->review }}</p>
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
    @section('js')
        <script>
            setTimeout(function() {
                document.querySelector('.alert-success')?.remove();
            }, 3000);
            setTimeout(function() {
                document.querySelector('.alert-error')?.remove();
            }, 3000);
        </script>

    @stop
</x-weblayout>
