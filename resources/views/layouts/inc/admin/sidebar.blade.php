<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders') }}">
                <i class="mdi mdi-shape-outline menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('homeCategory') }}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="category">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('addCategory') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('homeCategory') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('homeProducts') }}">
                <i class="mdi mdi-cart-arrow-up menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="products">
                <i class="mdi mdi-cart-arrow-up menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('addProduct') }}">Add Products</a>
                    </li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('homeProducts') }}">View Products</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('brands') }}">
                <i class="mdi mdi-watermark menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('homeColor') }}">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('homeSlider') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>

    </ul>
</nav>
