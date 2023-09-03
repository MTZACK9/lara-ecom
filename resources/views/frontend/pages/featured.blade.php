@extends('layouts.app')
@section('title', 'Featured Products')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center text-uppercase">Featured Products</h4>
                    <div class="underline mx-auto"></div>

                </div>
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($featuredProducts as $product)
                            <div class="prodowl col-md-3">
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
