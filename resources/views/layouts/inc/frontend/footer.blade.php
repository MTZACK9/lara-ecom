<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center container justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            @if ($appSetting->facebook)
                <a href="{{ $appSetting->facebook }}" target="_blank" class="me-4 link-secondary">
                    <i class="fa fa-facebook-f"></i>
                </a>
            @endif

            @if ($appSetting->twitter)
                <a href="{{ $appSetting->twitter }}" target="_blank" class="me-4 link-secondary">
                    <i class="fa fa-twitter"></i>
                </a>
            @endif

            @if ($appSetting->youtube)
                <a href="{{ $appSetting->youtube }}" target="_blank" class="me-4 link-secondary">
                    <i class="fa fa-youtube"></i>
                </a>
            @endif

            @if ($appSetting->instagram)
                <a href="{{ $appSetting->instagram }}" target="_blank" class="me-4 link-secondary">
                    <i class="fa fa-instagram"></i>
                </a>
            @endif
            {{-- <a href="" class="me-4 link-secondary">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fa fa-github"></i>
            </a> --}}
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase text-warning fw-bold mb-4">
                        {{ $appSetting->website_name ?? 'E-SHOP' }}
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-warning fw-bold mb-4">
                        Usefull Links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">About Us</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Contact Us</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Blogs</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-warning fw-bold mb-4">
                        Shop Now
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Featured Products</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">New Arrivals</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Categories</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Trending Products</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 text-warning">Contact</h6>
                    <p><i class="fa fa-home me-3 text-secondary"></i> {{ $appSetting->address ?? 'Hay Elhassani' }}</p>
                    <p>
                        <i class="fa fa-envelope me-3 text-secondary"></i>
                        {{ $appSetting->email ?? 'zakariamait5@gmail.com' }}
                    </p>
                    <p><i class="fa fa-phone me-3 text-secondary"></i>{{ $appSetting->phone1 ?? '01920393303' }}</p>
                    <p><i class="fa fa-print me-3 text-secondary"></i>{{ $appSetting->phone2 ?? '01920393303' }}</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="#">MAIT AND BINOUA</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
