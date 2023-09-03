@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">

            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($slider->image)
                        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="">
                    @endif
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->description }}</p>
                    </div> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $slider->title }}
                            </h1>
                            <p>
                                {{ $slider->description }}
                            </p>
                            <div>
                                <a href="{{ route('collections') }}" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- Welcome  --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <h4>Welcome To E-Shop</h4>
                    <div class="underline mx-auto"></div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia nemo, repudiandae, quaerat
                        facilis
                        ipsum natus, quo voluptatum placeat quidem delectus molestiae totam blanditiis nobis officia autem
                        recusandae voluptatibus vitae! Odit?
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Trending --}}
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">Trending Products</h4>
                    <div class="underline mx-auto"></div>

                </div>
                <div class="col-md-12">
                    {{-- <div class="row"> --}}
                    <div class="owl-carousel owl-theme product-owl-carousel">
                        @foreach ($trendingProducts as $product)
                            <div class="prodowl">
                                <div class="product-card">
                                    <div class="badge">
                                        <label class="bg-danger p-2 rounded"><small>Trending</small></label>
                                    </div>
                                    <div class="product-tumb">
                                        @if ($product->productImages->count() > 0)
                                            <a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{ $product->brand }}</span>
                                        <h4><a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">{{ $product->name }}</a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>${{ $product->original_price }}</small>${{ $product->selling_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- </div> --}}
                </div>

                {{-- <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available</h4>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- New Arrivals --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">New Arrivals</h4>
                    <div class="underline mx-auto"></div>

                </div>
                <div class="col-md-12">
                    {{-- <div class="row"> --}}
                    <div class="owl-carousel owl-theme  rtl-carousel">
                        @foreach ($newArrivalProducts as $product)
                            <div class="prodowl">
                                <div class="product-card">
                                    <div class="badge">
                                        <label class="bg-warning p-2 rounded"><small>New</small></label>
                                    </div>
                                    <div class="product-tumb">
                                        @if ($product->productImages->count() > 0)
                                            <a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{ $product->brand }}</span>
                                        <h4><a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">{{ $product->name }}</a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>${{ $product->original_price }}</small>${{ $product->selling_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ route('new-arrivals') }}" class="btn btn-warning text-white text-uppercase">View
                            more</a>
                    </div>
                    {{-- </div> --}}
                </div>
                {{-- <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available</h4>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- Featured Products --}}
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">Featured Products</h4>
                    <div class="underline mx-auto"></div>

                </div>
                <div class="col-md-12">
                    {{-- <div class="row"> --}}
                    <div class="owl-carousel owl-theme product-owl-carousel">
                        @foreach ($featuredProducts as $product)
                            <div class="prodowl">
                                <div class="product-card">
                                    <div class="badge">
                                        <label class="bg-success p-2 rounded"><small>Featured</small></label>
                                    </div>
                                    <div class="product-tumb">
                                        @if ($product->productImages->count() > 0)
                                            <a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{ $product->brand }}</span>
                                        <h4><a
                                                href="{{ route('viewProductsDet', [$product->category->slug, $product->slug]) }}">{{ $product->name }}</a>
                                        </h4>

                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>${{ $product->original_price }}</small>${{ $product->selling_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ route('featured-products') }}" class="btn btn-warning text-white text-uppercase">View
                            more</a>
                    </div>
                    {{-- </div> --}}
                </div>
                {{-- <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available</h4>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.product-owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.rtl-carousel').owlCarousel({
            rtl: false,
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
