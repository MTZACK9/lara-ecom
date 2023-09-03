@extends('layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection

@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection

@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mt-4 mb-3">
                    <h4 class="text-center text-uppercase">Products</h4>
                    <div class="underline mx-auto"></div>

                </div>

                <livewire:frontend.product.index :category="$category" />
            </div>
        </div>
    </div>
@endsection
