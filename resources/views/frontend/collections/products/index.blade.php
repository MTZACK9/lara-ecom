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
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">

                <div class="d-flex justify-content-center align-items-center  mb-4">
                    <button class="btn btn-dark">OUR PRODUCTS</button>
                </div>

                <livewire:frontend.product.index :category="$category" />
            </div>
        </div>
    </div>
@endsection
