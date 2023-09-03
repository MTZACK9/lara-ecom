@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <form action="" method="POST">
                @csrf

                <div class="card mb-3">
                    <div class="card-header bg-danger py-3">
                        <h3 class="text-white mb-0">Webstie</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website Url</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keywords</label>
                                <input type="text" name="meta_keyword" value="{{ $setting->meta_keyword ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ $setting->meta_description ?? '' }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-danger py-3">
                        <h3 class="text-white mb-0">Webstie - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Adress</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone 1*</label>
                                <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone 2</label>
                                <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $setting->email ?? '' }}"
                                    class="form-control">
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control">
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-danger py-3">
                        <h3 class="text-white mb-0">Webstie - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Youtube</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}"
                                    class="form-control">
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control">
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection
