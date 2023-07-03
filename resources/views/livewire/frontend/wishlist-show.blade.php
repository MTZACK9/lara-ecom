<div class="wishlist">
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center  mb-4">
                <h1 class="btn btn-dark">MY WISHLIST</h1>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Product</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Price</div>
                            </th>
                            {{-- <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantity</div>
                            </th> --}}
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                                <tr>
                                    <th scope="row">
                                        <div class="p-2">
                                            <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}"
                                                alt="{{ $wishlistItem->product->name }}" width="70"
                                                class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a
                                                        href="{{ route('viewProductsDet', [$wishlistItem->product->category->slug, $wishlistItem->product->slug]) }}"
                                                        class="text-dark d-inline-block">{{ $wishlistItem->product->name }}</a>
                                                </h5><span class="text-muted font-weight-normal font-italic">Category:
                                                    {{ $wishlistItem->product->category->name }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle">
                                        <strong>${{ $wishlistItem->product->selling_price }}</strong>
                                    </td>
                                    {{-- <td class="align-middle">
                                        <div class="input-group">
                                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="1" class="input-quantity" />
                                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                        </div>
                                        <strong>3</strong>
                                    </td> --}}
                                    <td class="align-middle">
                                        <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})"
                                            class="btn btn-danger text-white">


                                            <span wire:loading.remove
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i
                                                    class="fa
                                                fa-trash"></i>
                                            </span>

                                            <span wire:loading
                                                wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                Removing...
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Item Found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <!-- End -->
        </div>
    </div>
</div>
