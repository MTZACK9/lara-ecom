<div class="uniqueNav">
    <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
                    <span
                        class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>support@eshop.com</strong></span>
                    <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-noneme-3"><i
                            class="fa fa-phone me-1 text-warning"></i>
                        <strong>212654532464</strong></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  d-lg-block d-md-block-d-sm-block d-xs-none text-end">
                    <span class="me-3"><i class="fa fa-shopping-cart text-muted me-1"></i><a class="text-muted"
                            href="{{ route('cart') }}">CART(
                            <livewire:frontend.cart.cart-count />)
                        </a></span>
                    <span class="me-3"><i class="fa fa-heart  text-muted me-2"></i><a class="text-muted"
                            href="{{ route('wishlist') }}">Wishlist (
                            <livewire:frontend.wishlist-count />)
                        </a>
                    </span>

                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand"
                href="{{ url('/') }}"><strong>{{ $appSetting->website_name ?? 'E-SHOP' }}</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
                <form method="GET" action="{{ route('search') }}" role="search">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ Request::get('search') }}"
                            class="form-control border-warning" required placeholder="Search By Product"
                            style="color:#7a7a7a">
                        <button class="btn btn-warning text-white"><i class="fa fa-search"></i></button>

                    </div>
                </form>
            </div>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <div class="ms-auto d-none d-lg-block">
                    <form method="GET" action="{{ route('search') }}" role="search">
                        <div class="input-group">
                            {{-- <span class="border-warning input-group-text bg-warning text-white"><i
                            class="fa fa-search"></i></span> --}}
                            <input type="text" name="search" required value="{{ Request::get('search') }}"
                                class="form-control border-warning" placeholder="Search By Product"
                                style="color:#7a7a7a">
                            <button class="btn btn-warning text-white"><i class="fa fa-search"></i></button>

                        </div>
                    </form>
                </div>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="{{ route('collections') }}">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="{{ route('new-arrivals') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="{{ route('featured-products') }}">Featured
                            Products</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto ">

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>
                                        Profile</a></li>
                                @if (auth()->user()->role_as == '1')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                                class="fa fa-dashboard"></i> Dashboard</a>
                                    </li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('order') }}"><i class="fa fa-list"></i> My
                                        Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> My
                                        Wishlist</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('cart') }}"><i
                                            class="fa fa-shopping-cart"></i>
                                        My
                                        Cart</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

</div>
