<div>
    <div class="row">
        <div class=" d-none d-md-block col-md-3">
            @if ($category->brands)
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brand)
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}">
                                {{ $brand->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mb-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low"> High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high"> Low to High
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    
                    <div class="col-md-4">
                        <div class="prodowl">
                            <div class="product-card">
                                <div class="badge">
                                    @if ($product->quantity > 0)
                                        <label class="bg-success p-2 rounded"><small>In Stock</small></label>
                                    @else
                                        <label class="bg-danger p-2 rounded"><small>Out Of Stock</small></label>
                                    @endif

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
                    </div>

                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4 class="text-center">No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
