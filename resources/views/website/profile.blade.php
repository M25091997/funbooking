<x-weblayout>
    <section class="common-bg">
        <div class="common-gradient"></div>
        <div class="container">
            <div class="common-content">
                <p>Fun Book World</p>
                <h2>My Account</h2>
            </div>
        </div>
    </section>
    <section class="faq-section">
        <div class="container">
            <div class="align-items-start">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-account-menu">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="true">
                                    <ul>
                                        <li>
                                            Profile
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-user"></i>
                                        </li>
                                    </ul>
                                </button>
                                {{-- <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-address" type="button" role="tab"
                                    aria-controls="v-pills-address" aria-selected="true">
                                    <ul>
                                        <li>
                                            Address
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </li>
                                    </ul>
                                </button> --}}
                                <button class="nav-link" id="v-pills-properties-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-properties" type="button" role="tab"
                                    aria-controls="v-pills-properties" aria-selected="false">
                                    <ul>
                                        <li>
                                            My Bookings
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-list"></i>
                                        </li>
                                    </ul>
                                </button>
                                <a href="#" class="nav-link" type="button" role="tab"
                                    aria-controls="v-pills-refer" aria-selected="false">
                                    <ul>
                                        <li>
                                            Refer & Earn
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-coins"></i>
                                        </li>
                                    </ul>
                                </a>
                                {{-- <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-payment" type="button" role="tab"
                                    aria-controls="v-pills-payment" aria-selected="false">
                                    <ul>
                                        <li>
                                            Payments
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-money-bill"></i>
                                        </li>
                                    </ul>
                                </button> --}}
                                {{-- <button class="nav-link" id="v-pills-changepassword-tab" data-bs-toggle="pill" data-bs-target="#v-pills-changepassword" type="button" role="tab" aria-controls="v-pills-changepassword" aria-selected="false">
                              <ul>
                                 <li>
                                    Change Password
                                 </li>
                                 <li>
                                    <i class="fa-solid fa-lock"></i>
                                 </li>
                              </ul>
                           </button> --}}
                                <button class="nav-link" id="v-pills-logout-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-logout" type="button" role="tab"
                                    aria-controls="v-pills-logout" aria-selected="false">
                                    <ul>
                                        <li>
                                            <p href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </p>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="right-account-content">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab" tabindex="0">
                                    <div class="right-profile">
                                        <div class="accoutn-profile">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="profile-img">
                                                        <img src="{{ asset('storage/' . $user->profile_image ?? 'images/user3.jpg') }}"
                                                            alt="profile image">
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-md-9">
                                                    <div class="profile-data">
                                                        <strong>Profile</strong>
                                                        <h3>{{ $user->name }}</h3>
                                                        {{-- <div class="pro-del">
                                                <ul>
                                                   <li>
                                                      <i class="fa-solid fa-location-dot"></i>
                                                   </li>
                                                   <li>
                                                      <p>Brooklyn, New York, United States</p>
                                                   </li>
                                                </ul>
                                             </div> --}}
                                                        <div class="pro-del">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-solid fa-phone-volume"></i>
                                                                </li>
                                                                <li>
                                                                    <a href="#">{{ $user->mobile }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @if ($user->email)
                                                            <div class="pro-del">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa-solid fa-envelope"></i>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">{{ $user->email }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-profile">
                                        <div class="form-details-account">
                                            <form action="{{ route('customerProfile.update', Auth::user()->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-lg-6 mb-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Name:</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" name="name" value="{{ $user->name }}"
                                                            required>
                                                        @error('name')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Mobile:</label>
                                                        <input type="text" name="mobile" class="form-control"
                                                            id="dname" placeholder="Mobile"
                                                            value="{{ $user->mobile }}" readonly>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Email:</label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" value="{{ $user->email }}"
                                                            placeholder="Enter email">
                                                        @error('email')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">City:</label>
                                                        <input type="text" name="city" class="form-control"
                                                            id="city" value="{{ $user->city }}"
                                                            placeholder="Enter your city">
                                                        @error('city')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label for="image" class="form-label">Profile
                                                            Image:</label>
                                                        <input type="file" name="image" class="form-control"
                                                            id="image" accept="image/*">

                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="change-pwd">
                                          <h5>PASSWORD CHANGE</h5>
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-12 mb-4">
                                             <label for="exampleFormControlInput1" class="form-label">Current password (leave blank to leave unchanged):</label>
                                             <input type="text" class="form-control" id="cpassword">
                                          </div>
                                          <div class="col-lg-12 mb-4">
                                             <label for="exampleFormControlInput1" class="form-label">New password (leave blank to leave unchanged):</label>
                                             <input type="text" class="form-control" id="npassword">
                                          </div>
                                          <div class="col-lg-12 mb-4">
                                             <label for="exampleFormControlInput1" class="form-label">Confirm new password:</label>
                                             <input type="text" class="form-control" id="cnpassword">
                                          </div>
                                       </div> --}}
                                                <button type="submit" class="btn SaveChangeBtn">Update
                                                    Profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                    aria-labelledby="v-pills-address-tab" tabindex="0">
                                    <div class="right-profile">
                                        <div class="form-account">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                        </div>
                                        <div class="form-details-account">
                                            <h5>
                                                Billing Addressedit
                                            </h5>
                                            <strong>Alex Tuntuni</strong>
                                            <p>1355 Market St, Suite 900
                                                San Francisco, CA 94103
                                            </p>
                                            <p>Mobile: <a href="#">(123) 456-7890</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-properties" role="tabpanel"
                                    aria-labelledby="v-pills-properties-tab" tabindex="0">
                                    <div class="myproperty">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="50%">Booking</th>
                                                        <th scope="col" width="15%">Booking Date</th>
                                                        <th scope="col" width="15%">Status</th>
                                                        <th scope="col" width="15%">Booking On</th>
                                                        <th scope="col" width="5%">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (App\Models\Booking::where('user_id', Auth::user()->id)->latest()->get() as $booking)
                                                        @php
                                                            $park = json_decode($booking->park_details);
                                                            $averageRating = $booking->park->averageRating();

                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <ul class="img-pro-del">
                                                                    <li>
                                                                        <div class="property-img">
                                                                            <img src="{{ asset('storage/' . $booking->park->parkImage->first()->path ?? 'default.jpg') }}"
                                                                                alt="park image">


                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="propery-details">
                                                                            <h5>{{ $park->name }}</h5>
                                                                            <ul>
                                                                                <li>
                                                                                    <i
                                                                                        class="fa-solid fa-location-dot pl-4"></i>
                                                                                </li>
                                                                                <li class="property-add">
                                                                                    {{ $park->address }}
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="reviewRat">
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    @if ($i <= floor($averageRating))
                                                                                        <!-- Full Star -->
                                                                                        <li>
                                                                                            <i class="fa-solid fa-star"
                                                                                                style="color: gold;"></i>
                                                                                        </li>
                                                                                    @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) > 0)
                                                                                        <!-- Half Star -->
                                                                                        <li>
                                                                                            <i class="fa-solid fa-star-half-stroke"
                                                                                                style="color: gold;"></i>
                                                                                        </li>
                                                                                    @else
                                                                                        <!-- Empty Star -->
                                                                                        <li>
                                                                                            <i class="fa-solid fa-star"
                                                                                                style="color: gray;"></i>
                                                                                        </li>
                                                                                    @endif
                                                                                @endfor

                                                                            </ul>
                                                                            <span class="review-num">
                                                                                ({{ $booking->park->reviews->count() }}
                                                                                Reviews)
                                                                            </span>

                                                                            {{-- <ul class="reviewRat">
                                                                                <li>
                                                                                    <i
                                                                                        class="fa-solid fa-star checked"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i
                                                                                        class="fa-solid fa-star checked"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i
                                                                                        class="fa-solid fa-star checked"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i
                                                                                        class="fa-solid fa-star checked"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <span class="review-num">
                                                                                ( 95 )
                                                                            </span> --}}
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td class="table-menu">{{ $booking->booking_date }}</td>
                                                            <td class="table-menu">{{ $booking->booking_status }}</td>
                                                            <td class="table-menu">
                                                                {{ $booking->created_at->format('d-m-Y') }}</td>
                                                            {{-- <td class="table-menu"><a href="#">Edit</a></td> --}}

                                                            <td class="table-menu"><button> <i class="fa fa-download"
                                                                        aria-hidden="true"></i></button></td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            <nav aria-label="Page navigation example" class="page-Number-property">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link circleBtn"
                                                            href="#"></a></li>
                                                    <li class="page-item"><a class="page-link pageNo"
                                                            href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link pageNo"
                                                            href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link pageNo"
                                                            href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link circleBtn"
                                                            href="#"></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-refer" role="tabpanel"
                                    aria-labelledby="v-pills-refer-tab" tabindex="0">Earn and refer</div>
                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                    aria-labelledby="v-pills-payment-tab" tabindex="0">
                                    <div class="right-profile">
                                        <div class="form-account">
                                            <h4>Payment Method</h4>
                                        </div>
                                        <div class="payment-card-option">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-input">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#paymentcollapseOne">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Check Payments
                                                        </label>
                                                    </div>
                                                    <div id="paymentcollapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body accordionContent"
                                                            aria-expanded="true">
                                                            Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode..
                                                            <div class="accordion-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-input">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault11"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#paymentcollapseTwo" aria-expanded="false"
                                                            aria-controls="paymentcollapseTwo">
                                                        <label class="form-check-label" for="flexRadioDefault11">
                                                            Cash on delivery
                                                        </label>
                                                    </div>
                                                    <div id="paymentcollapseTwo" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body accordionContent">
                                                            Pay with cash upon delivery.
                                                            <div class="accordion-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-input">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault12"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#paymentcollapseThree">
                                                        <label class="form-check-label" for="flexRadioDefault12">
                                                            PayPal
                                                        </label>
                                                    </div>
                                                    <div id="paymentcollapseThree"
                                                        class="accordion-collapse collapse paypal-button"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body accordionContent"
                                                            aria-expanded="false"
                                                            aria-controls="paymentcollapseThree">
                                                            Pay via PayPal; you can pay with your credit card if you
                                                            don’t have a PayPal account.
                                                            <div class="accordion-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-changepassword" role="tabpanel"
                                    aria-labelledby="v-pills-changepassword-tab" tabindex="0">
                                    <div class="right-profile">
                                        <div class="form-account">
                                            <h4>Change Password</h4>
                                        </div>
                                        <div class="form-details-account">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-4">
                                                        <input type="text" class="form-control" id="cpassword"
                                                            placeholder="Change Password*">
                                                    </div>
                                                    <div class="col-lg-12 mb-4">
                                                        <input type="text" class="form-control" id="npassword"
                                                            placeholder="New Password">
                                                    </div>
                                                    <div class="col-lg-12 mb-4">
                                                        <input type="text" class="form-control" id="cnpassword"
                                                            placeholder="Confirm New Password">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn SaveChangeBtn">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-logout" role="tabpanel"
                                    aria-labelledby="v-pills-logout-tab" tabindex="0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-weblayout>
