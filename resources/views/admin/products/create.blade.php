@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Products
                        <a href="{{ route('homeProducts') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane"
                                    type="button" role="tab" aria-controls="seo-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">
                                    Product Color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mt-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="mt-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                </div>

                                <div class="mt-3">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="">Small Description (500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="mt-3">
                                    <label for="">Description</label>
                                    <textarea name="description" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab"
                                tabindex="0">
                                <div class="mt-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>

                                <div class="mt-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="mt-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Original Price</label>
                                            <input type="text" name="original_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Selling Price</label>
                                            <input type="text" name="selling_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Quantity</label>
                                            <input type="number" min="0" name="quantity" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Featured</label>
                                            <input type="checkbox" name="featured" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" style="width:20px; height:20px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                                tabindex="0">
                                <div class="mt-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control">
                                </div>
                            </div>

                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                                tabindex="0">
                                <div class="mt-3">
                                    <label for="">Select Color:</label>
                                    <br>
                                    <br>
                                    <div class="row">
                                        @forelse ($colors as $color)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}" style="width:20px; height:20px;">
                                                    {{ $color->name }}
                                                    <br>
                                                    <br>
                                                    Quantity: <input type="number"
                                                        style="width: 70px; border:1px solid #ddd"
                                                        name="colorquantity[{{ $color->id }}]" min="0">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No color Found</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
