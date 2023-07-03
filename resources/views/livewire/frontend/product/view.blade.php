<div>
    <div class="py-3 py-md-5">
        <div class="single-p">

            <div class=" small-container single-product">
                <div>

                    {{-- @if (session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show">

                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif --}}

                </div>
                <div class="row">
                    <div class="col-2">
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" width="100%" id="ProductImg" />
                        @else
                            No Image Found
                        @endif

                        {{-- <div class="small-img-row mt-1">
                            <div class="small-img-col">
                                <img src="{{ asset($product->productImages[0]->image) }}" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="{{ asset($product->productImages[0]->image) }}" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="{{ asset($product->productImages[0]->image) }}" class="small-img" />
                            </div>
                            <div class="small-img-col">
                                <img src="{{ asset($product->productImages[0]->image) }}" class="small-img" />
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-2">
                        <h4 class="product-name">
                            {{ $product->name }}
                            {{-- <label class="label-stock bg-success">In Stock</label> --}}
                        </h4>
                        <p>Home / {{ $product->category->name }} / {{ $product->name }}</p>

                        {{-- <h2>Red Printed T-Shirt By HRX</h2> --}}
                        <div>
                            <span class="selling-price">${{ $product->selling_price }}</span>
                            <span class="original-price">${{ $product->original_price }}</span>
                        </div>

                        {{-- Color check quantity --}}

                        <div class="mt-2">
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $key => $color)
                                        {{-- <input type="radio" name="colorSelection" id="c_{{ $key }}"
                                            value="{{ $color->id }}">
                                        <label class="me-2"
                                            for="c_{{ $key }}">{{ $color->color->name }}</label> --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $color->color->code }}"
                                            wire:click="colorSelected({{ $color->id }})">
                                            {{ $color->color->name }}
                                        </label>
                                    @endforeach
                                @endif
                                <div class="mt-2">


                                    @if ($this->productColorSelectedQuantity == 'out-of-stock')
                                        <label class="label-stock text-white bg-danger">Out Of Stock</label>
                                    @elseif ($this->productColorSelectedQuantity > 0)
                                        <label class="label-stock text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="label-stock text-white bg-success">In Stock</label>
                                @else
                                    <label class="label-stock text-white bg-danger">Out Of
                                        Stock</label>
                                @endif
                            @endif

                        </div>
                        {{-- <select name="" id="">
                            <option value="">Select Size</option>
                            <option value="">XXL</option>
                            <option value="">XL</option>
                            <option value="">Large</option>
                            <option value="">Medium</option>
                            <option value="">Small</option>
                        </select> --}}
                        {{-- <input type="number" value="1" /> --}}
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1 text-danger" wire:click="decrementQuantity"><i
                                        class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" readonly
                                    value="{{ $this->quantityCount }}" class="input-quantity" />
                                <span class="btn btn1 text-danger" wire:click="incrementQuantity"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <button type="button" wire:click="AddToCart({{ $product->id }})"
                                class="btn btn1 btn-danger text-white">
                                <i class="fa fa-shopping-cart text-white"></i> Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishList({{ $product->id }})"
                                class="btn btn1 text-danger">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">
                                    Adding...
                                </span>
                            </button>
                        </div>


                        {{-- <a href="" class="btn">Add to Cart</a> --}}
                        <h3>Small Description</h3>
                        {{-- <br /> --}}
                        <p>
                            {{-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the --}}
                            {{ $product->small_description }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. --}}

                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
