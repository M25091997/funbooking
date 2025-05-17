<nav class="navbar navbar-expand-lg funbook-navbar TransparentNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website.home') }}">
            <!-- <h2 class="company-logo">FunBook</h2> -->
            @php $favoritesCount = \App\Models\Favorite::where('user_id', Auth::id())->count(); @endphp
            <img src="{{ asset('images/fun-book-logo.png') }}" alt="company logo">
        </a>
        <div class="navbar-text">
            <div class="offcanvas offcanvas-end menu-bg" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel"> <img src="./images/fun-book-logo.png"
                            alt="company logo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('website.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('website.categoryGallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="top-right-menuBtn">
            <ul class="right-notiwishlist">
                <li>
                    <a href="{{ route('website.favorites') }}">
                        <i class="fa-solid fa-heart"></i>
                        <div class="num-info">{{ $favoritesCount }}</div>
                    </a>

                </li>
                <li>

                    <div class="notification-btn" onclick="toggleNotifications()">
                        <button><i class="fa-solid fa-bell"></i>
                            <div class="num-info">1</div>
                        </button>
                    </div>
                </li>
            </ul>

            @if (!Auth::check() || !Auth::user()->hasRole('Customer'))
                <div class="top-signin d-none d-lg-block d-md-block">
                    <a data-bs-toggle="modal" data-bs-target="#signinsocilamedia">Sign In <i
                            class="fa-regular fa-user"></i></a>
                </div>
            @else
                <div class="top-signin d-none d-lg-block d-md-block">
                    <a href="{{ route('website.profile') }}"> Profile <i class="fa-regular fa-user"></i></a>
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
               <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout <i class="fa fa-sign-out"></i>
               </a> --}}
                </div>
            @endif
            {{-- <div class="top-signin tickeNow d-none d-lg-block d-md-block">
               <a href="#">Ticket Now <i class="fa-solid fa-ticket"></i></a>
            </div> --}}
            <div class="top-signin d-block d-lg-none d-md-none">
                <a data-bs-toggle="modal" data-bs-target="#signinsocilamedia"><i class="fa-regular fa-user"></i></a>
            </div>
            <div class="top-signin tickeNow d-block d-lg-none d-md-none">
                <a href="#"><i class="fa-solid fa-ticket"></i></a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </div>
</nav>

<section>
    <div class="container">

        <div class="notify-container">
            <div class="notification-container" id="notificationList">
                <div class="notification-card">
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        @foreach (App\Models\UserNotification::where(['user_id' => Auth::user()->id, 'status' => 0])->latest()->take(10)->get() as $notification)
                            <div class="notification">
                                <div class="icon">📢</div>
                                <div class="content">
                                    <strong>{{ $notification->title }}</strong><br>
                                    <span
                                        class="time">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span><br>
                                </div>
                                <p>{{ $notification->message }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="notification">
                            <div class="icon">📢</div>
                            <div class="content">
                                <strong> Read Notification</strong><br>
                                <span class="time">2 minutes ago</span> <br>
                            </div>
                            <p>Log in to receive notifications</p>
                        </div>
                    @endif

                </div>
                {{-- <div class="notification">
                     <div class="icon">📢</div>
                     <div class="content">
                        <strong>System Update</strong><br>
                        <span class="time">10 minutes ago</span>
                     </div>
                  </div>
                  <div class="notification">
                     <div class="icon">✅</div>
                     <div class="content">
                        <strong>Task Completed</strong><br>
                        <span class="time">1 hour ago</span>
                     </div>
                  </div> --}}
            </div>
        </div>
    </div>
</section>
