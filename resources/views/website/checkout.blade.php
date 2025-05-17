<x-weblayout>
    <section class="checkout-section">
        <div class="container">
            <form action="{{ route('booking.complete', $booking->order_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-section">
                            <div class="headline">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="billing-form">
                                <label>Full Name *</label>
                                <input type="text" name="name" value="{{ Auth::user()->name ?? null }}" required />
                                <label>Email </label>
                                <input type="email" name="email" value="{{ Auth::user()->email ?? null }}" />
                                <label>Phone *</label>
                                <input type="tel" name="phone" pattern="[0-9]{10}" maxlength="10"
                                    value="{{ Auth::user()->phone ?? '' }}" required inputmode="numeric"
                                    placeholder="Enter 10-digit phone number" />
                                <label>Address *</label>
                                <input type="text" name="address" value="{{ Auth::user()->address ?? null }}"
                                    required />
                                <label>City *</label>
                                <input type="text" name="city" value="{{ Auth::user()->city ?? null }}"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Booking Summary -->
                        <div class="summary-section">
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
                            <div class="headline">
                                <h2>Booking Summary</h2>
                            </div>
                            <div class="summary-card d-none">
                                <h5>Dolpo Trekking</h5>
                                <p>Starting Date: January 9, 2025</p>
                                <span class="trip-code">Trip Code: WTE-283</span>
                            </div>
                            <ul class="bookpackeage">
                                <li class="pcheck">
                                    Tickets:
                                </li>
                                <li>
                                    Amount
                                </li>
                            </ul>
                            @php
                                $subTotal = 0;
                                $discount = 0;
                            @endphp
                            @foreach ($booking->bookingDetails as $details)
                                @php $subTotal += ($details->price * $details->quantity); @endphp
                                <ul class="bookpackeage">
                                    <li class="pcheck">
                                        {{ $details->ticketType->name }} ({{ $details->quantity }}):
                                    </li>

                                    <li>
                                        ₹{{ number_format($details->price * $details->quantity) }}
                                    </li>
                                </ul>
                            @endforeach

                            <label for="discount"><strong>Apply Discount</strong></label>
                            <input type="text" id="discount" class="summary-input"
                                placeholder="Enter Coupon Code" />
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View Coupon
                            </button>
                            <hr />
                            <ul class="bookpackeage">
                                <li class="pcheck subtotal">
                                    Subtotal:
                                </li>
                                <li>
                                    ₹{{ number_format($subTotal, 2) }}
                                </li>
                            </ul>
                            <ul class="bookpackeage">
                                <li class="pcheck subtotal">
                                    Discount:
                                </li>
                                <li>
                                    ₹{{ number_format($discount, 2) }}
                                </li>
                            </ul>
                            <ul class="bookpackeage">
                                <li class="pcheck total">
                                    Total Payable:
                                </li>
                                <li>
                                    ₹{{ number_format($subTotal - $discount, 2) }}
                                </li>
                            </ul>
                            <div class="card-inn">
                                <div class="buynow">
                                    <button type="submit" class="text-light">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog available-coupons modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Available Coupons</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @php  $coupans = App\Models\Discount::where(['is_active' => true, 'park_id' => $booking->park_id])->get();  @endphp
                        @foreach($coupans as $coupan)
                      @if( $coupan->valid_from <= now() && $coupan->valid_until >= now())
                        <div class="col-lg-6 col-md-4 col-sm-6 mb-3">
                            <div class="coupon" data-discount="100">
                                <div class="coupon-inner">
                                    <div class="coupon-left">
                                        <span class="scissor">✂</span>
                                        <div class="coupon-code copyable">{{ $coupan->code}}</div>
                                        <div class="coupon-desc">{{ $coupan->name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="col-lg-6 col-md-4 col-sm-6 mb-3">
                            <div class="coupon" data-discount="200">
                                <div class="coupon-inner">
                                    <div class="coupon-left">
                                        <span class="scissor">✂</span>
                                        <div class="coupon-code copyable">SUMMER200</div>
                                        <div class="coupon-desc">₹200 off on summer packages</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 mb-3">
                            <div class="coupon" data-discount="200">
                                <div class="coupon-inner">
                                    <div class="coupon-left">
                                        <span class="scissor">✂</span>
                                        <div class="coupon-code copyable">SUMMER200</div>
                                        <div class="coupon-desc">₹200 off on summer packages</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 mb-3">
                            <div class="coupon" data-discount="15">
                                <div class="coupon-inner">
                                    <div class="coupon-left">
                                        <span class="scissor">✂</span>
                                        <div class="coupon-code copyable">OFF15</div>
                                        <div class="coupon-desc">15% off on summer packages</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-weblayout>
