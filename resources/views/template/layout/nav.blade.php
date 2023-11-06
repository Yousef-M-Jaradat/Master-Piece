<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 07 7777 7777</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">yousef.jaradat@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">5 Business days at week</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('image/mas/img/mashtal-logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route("shop",$id=1)}}">Seeds</a>
                        <a class="dropdown-item" href="{{route("shop",$id=2)}}">Solis</a>
                        <a class="dropdown-item" href="{{route("shop",$id=3)}}">Fertilizer</a>
                        <a class="dropdown-item" href="{{route("shop",$id=4)}}">Trees</a>
                        <a class="dropdown-item" href="{{ route('allProduct') }}">All Prdouct</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                {{-- <li class="nav-item"><a href="../vegefoods-master/material-dashboard-master/pages/dashboard.html"
                            class="nav-link">Admin</a></li> --}}
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item cta cta-colored"><a href="{{route("cart.index")}}" class="nav-link"><span
                                class="icon-shopping_cart"></span>[{{$items}}]</a></li>
                {{-- <li class="nav-item"><a href="profile.html" class="nav-link"><i
                                class="fa-regular fa-user"></i></a>
                    </li>
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link"><button
                                id="nav-btn">login</button></a>
                    </li> --}}

                <li>
                    @if (Auth::check())
                    <li class="nav-link">
                        <div class="dropdown">
                            <a class="nav-link profile-link dropdown-toggle" href="#" id="profileDropdown"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('images/users/' . Auth::user()->image) }}"
                                    alt="{{ Auth::user()->image }}" class="user-image profile-image">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit', [Auth::user()]) }}">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </div>
                        </div></li>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('login1') }}" class="btn btn-success mr-30">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login1') }}" class="btn btn-success ">
                        Register
                    </a>
                </li>
                @endif
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
