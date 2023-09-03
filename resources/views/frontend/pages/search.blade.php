@extends('layouts.app')
@section('title', 'Search')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row ">
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                <div class="col-md-12 mb-3">
                    <h4 class="text-center text-uppercase">Search for <span
                            class="text-warning fst-italic fw-lighter">{{ $searchHistory }}...</span></h4>
                    <div class="underline mx-auto"></div>
                </div>
                
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($searchProducts as $product)
                            <div class="prodowl col-md-3">
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
                        @empty
                            <div class="col-md-12">
                                <div class="pt-2">
                                    <h4 class="text-center">Nothing Looks Like
                                        <span class="text-warning fst-italic fw-lighter">"{{ $searchHistory }}"</span>
                                    </h4>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pt-2 d-flex justify-content-center">
                        {{ $searchProducts->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
