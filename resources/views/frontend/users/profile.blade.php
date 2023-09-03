@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center text-uppercase">Profile</h4>
                    <div class="underline mx-auto"></div>
                </div>

                <div class="col-md-10 mx-auto">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-header bg-warning text-white ">
                            <h4 class="mb-0text-white">User Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Email Address</label>
                                            <input type="text" readonly name="email" class="form-control"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ Auth::user()->userDetail->phone ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Zip Code</label>
                                            <input type="text" name="zip_code" class="form-control"
                                                value="{{ Auth::user()->userDetail->zip_code ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="">Address</label>
                                            <textarea name="address" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('user.profil.change-password') }}">Change password?</a>
                                            <button type="submit" class="btn btn-success float-end">Save Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
