<x-weblayout>
    <section class="common-bg">
        <div class="common-gradient"></div>
        <div class="container">
            <div class="common-content">
                <h2>Support</h2>
            </div>
        </div>
    </section>
    <section class="reception-section">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="book-ticket">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="booktik-img">
                                        <img src="{{ asset('images/reception.webp') }}" alt="reciption image">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="right-booktik">
                                        <h5>Reception Always Open</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.luctus nec ullamcorper
                                            mattis, pulvinar dapibus leo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-5">
                        <div class="book-ticket">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="booktik-img">
                                        <img src="{{ asset('images/online-booking.webp') }}" alt="reciption image">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="right-booktik">
                                        <h5>Online Support</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.luctus nec ullamcorper
                                            mattis, pulvinar dapibus leo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-left">
                            <div class="headline headtopic">
                                <h5> Support Ticket</h5>
                                <h3>Get In Touch</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor tellus vel mauris
                                scelerisque accumsan. Maecenas quis nunc sed sapien dignissim pulvinar. Se d at gravida.
                            </p>
                            <div class="touch-contact">
                                <ul>
                                    <li>
                                        <span>Email :</span> <a href="#">funbook@gmail.com</a>

                                    </li>
                                    <li>
                                        <span>Phone :</span> <a href="#">+91-8723412341</a>

                                    </li>
                                    <li>
                                        <span>Address :</span>
                                        <p>

                                            Raghuwar Heights, Ratu Road, Ranchi, Jharkhand - 834001
                                        </p>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-info-card">
                            <div class="headline headtopic mb-3">
                                <h5>Create Support Ticket</h5>
                            </div>
                            <div class="row">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('website.ticket_create') }}" method="post">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="service-input">
                                            <label for="name" class="form-label">Support Type:</label> <span
                                                class="text-danger">*</span>
                                            <!-- <input type="text" class="form-control" id="name" placeholder=""> -->
                                            <select id="support_type_id" name="support_type_id" required="">
                                                <option value="">-- Choose type --</option>
                                                @foreach (\App\Models\SupportType::where('is_active', true)->get() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('support_type_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="service-input">
                                            <label for="name" class="form-label">Select Park:</label>
                                            <!-- <input type="text" class="form-control" id="name" placeholder=""> -->
                                            <select id="park_id" name="park_id">
                                                <option value="">-- Choose park --</option>
                                                @foreach (\App\Models\Park::where('is_active', true)->get() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('park_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- 
                                <div class="col-lg-6">
                                    <div class="service-input">
                                        <label for="name" class="form-label">Name <span>*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                                    </div>
                                </div> --}}

                                    {{-- <div class="col-lg-6">
                                    <div class="service-input">
                                        <label for="email" class="form-label">Email <span>*</span></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                    </div>
                                </div> --}}
                                    {{-- <div class="col-lg-6">
                                    <div class="service-input">
                                        <label for="phone" class="form-label">Phone <span>*</span></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                                    </div>
                                </div> --}}
                                    <div class="col-lg-12">
                                        <div class="service-input">
                                            <label for="subject" class="form-label">Subject <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="" required>
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="service-input">
                                            <label for="message" class="form-label">Write Message </label> <span
                                                class="text-danger">*</span></label>
                                            <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="file" class="form-label">Attach File (Optional):</label>
                                        <input type="file" id="file" name="file" class="form-control">
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="invalidCheck" required="">
                                            <label class="form-check-label" for="invalidCheck">
                                                Agree to terms and conditions
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="more-info">
                                        <button type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="company-loaction">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7324.462173580437!2d85.310217!3d23.379856!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e1ff1c55bacd%3A0xbd730f5ae2453d28!2sTripledots%20Software%20Services%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1739183718793!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <script>
        var favoriteRemoveUrl = "{{ url('favorite/remove') }}";
        let csrfToken = "{{ csrf_token() }}"
    </script>

</x-weblayout>
