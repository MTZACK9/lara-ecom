@extends('layouts.app')

@section('title', 'Our Categories')

@section('content')
    <div class="categories">
        <div class="container pb-3">

            <div class="d-flex justify-content-center align-items-center mt-5"> <button class="btn btn-dark">OUR
                    CATEGORIES</button> </div>
            <div class="d-flex justify-content-center mt-3"> <span class="text text-center">Finding Best Products Now<br> in
                    Your
                    Fingertips</span> </div>
            <div class="row mt-2 g-4">

                @forelse ($categories as $category)
                    <div class="col-md-3">
                        <div class="card p-2">
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
