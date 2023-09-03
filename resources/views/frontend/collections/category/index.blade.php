@extends('layouts.app')

@section('title', 'Our Categories')

@section('content')
    <div class="categories bg-light">
        <div class="container py-5 ">

            <div class="col-md-12 ">
                <h4 class="text-center text-uppercase">Our Categories</h4>
                <div class="underline mx-auto"></div>

            </div>
            <div class="row mt-2 g-4">

                @forelse ($categories as $category)
                    <div class="col-md-3">
                        <div class="card p-2 shadow">
                            <a href="{{ route('showCollection', $category->slug) }}" class="text-dark"
                                style=" text-decoration: none;">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>{{ $category->name }}</span> </div>
                                    <div> <img src="{{ asset('uploads/category/' . $category->image) }}" height="100"
                                            width="100" /> </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-3">
                        <h1 class="text-center">No Categories Available</h1>
                    </div>
                @endforelse


            </div>
        </div>
    </div>
@endsection
