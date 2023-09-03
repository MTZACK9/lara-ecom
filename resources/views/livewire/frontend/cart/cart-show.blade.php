<div class="wishlist">
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="col-md-12 mb-4 ">
                <h4 class="text-center text-uppercase">My Cart</h4>
                <div class="underline mx-auto"></div>

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
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantity</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Total</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $item)
                            @if ($item->product)
                                <tr>
                                    <th scope="row">
                                        <div class="p-2">
                                            <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                alt="{{ $item->product->name }}" width="70"
                                                class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a
                                                        href="{{ route('viewProductsDet', [$item->product->category->slug, $item->product->slug]) }}"
                                                        class="text-dark d-inline-block">{{ $item->product->name }}</a>
                                                </h5><span class="text-muted font-weight-normal font-italic">Category:
                                                    {{ $item->product->category->name }}</span>
                                                @if ($item->productColor)
                                                    <br />
                                                    <small style="color: #777">color:
                                                        {{ $item->productColor->color->name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle">
                                        <strong>${{ $item->product->selling_price }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        <div class="input-group">
                                            <button type="button" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $item->id }})" class="btn btn1"><i
                                                    class="fa fa-minus"></i></button>

                                            <input type="text" value="{{ $item->quantity }}"
                                                class="input-quantity" />
                                            <button type="button" wire:loading.attr="disabled"
                                                wire:click="incrementQuantity({{ $item->id }})" class="btn btn1"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <strong>${{ $item->product->selling_price * $item->quantity }}</strong>
                                        @php
                                            $totalPrice += $item->product->selling_price * $item->quantity;
                                        @endphp
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="removeCartItem({{ $item->id }})"
                                            class="btn btn-danger text-white">


                                            <span wire:loading.remove
                                                wire:target="removeCartItem({{ $item->id }})">
                                                <i
                                                    class="fa
                                                fa-trash"></i>
                                            </span>

                                            <span wire:loading wire:target="removeCartItem({{ $item->id }})">
                                                Removing...
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Item Found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <!-- End -->

            <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <div class="shadow-sm bg-light p-3">
                        <h4>Total:
                            <span class="float-end">${{ $totalPrice }}</span>
                        </h4>
                        <hr>
                        <a href="{{ route('checkout') }}" class="btn btn-warning text-white w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
