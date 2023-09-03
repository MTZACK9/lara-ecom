@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            <div class="me-md-3 me-xl-5">
                @if (session('message'))
                    <h2>{{ session('message') }}</h2>
                @endif
            </div>
            <div class="me-md-3 mb-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>

            {{-- Orders --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body shadow rounded  mb-3 p-4">
                        <label class="text-muted mb-3">Total Orders</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalOrders }}</h1>
                            <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-warning text-white">View
                                Odrders</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Today Orders</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalTodayOrders }}</h1>
                            <a href="{{ route('featured-products') }}" class="btn btn-sm btn-warning text-white">View
                                Odrders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Month Orders</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalMonthOrders }}</h1>
                            <a href="{{ route('featured-products') }}" class="btn btn-sm btn-warning text-white">View
                                Odrders</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Year Orders</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalYearOrders }}</h1>
                            <a href="{{ route('featured-products') }}" class="btn btn-sm btn-warning text-white">View
                                Odrders</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Categories Brands and Products --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Categories</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalCategories }}</h1>
                            <a href="{{ route('homeCategory') }}" class="btn btn-sm btn-warning text-white">View
                                Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Brands</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalBrands }}</h1>
                            <a href="{{ route('brands') }}" class="btn btn-sm btn-warning text-white">View
                                Brands</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Products</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalProducts }}</h1>
                            <a href="{{ route('homeProducts') }}" class="btn btn-sm btn-warning text-white">View
                                Products</a>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Users --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Users</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalUsers }}</h1>
                            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-warning text-white">View
                                Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Normal Users</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalNormalUsers }}</h1>
                            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-warning text-white">View
                                Users</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body shadow rounded mb-3 p-4">
                        <label class="text-muted mb-3">Total Admins</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>{{ $totalAdmins }}</h1>
                            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-warning text-white">View
                                Users</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
