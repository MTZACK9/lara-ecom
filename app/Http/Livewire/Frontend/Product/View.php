<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'out-of-stock';
        }
    }

    public function addToWishList($productId)
    {

        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // session()->flash('message', 'Already added to wishlist');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);

                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                // session()->flash('message', 'Added to wishlist');
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            // session()->flash('message', 'You are not authenticated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'You are not authenticated',
                'type' => 'error',
                'status' => 401
            ]);
            return false;
        }
    }

    public function AddToCart($productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                // dd($this->product);
                //color quantity
                if ($this->product->productColors()->count() > 1) {
                    if ($this->productColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added To Cart',
                                'type' => 'info',
                                'status' => 200
                            ]);
                            return false;
                        } else {


                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {

                                if ($productColor->quantity >= $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => "Product Added To Cart",
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                    return true;
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => "Only {$productColor->quantity} Quantity Available",
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                    return false;
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out Of Stock',
                                    'type' => 'error',
                                    'status' => 404
                                ]);
                                return false;
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 102
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added To Cart',
                            'type' => 'info',
                            'status' => 200
                        ]);
                        return false;
                    } else {


                        if ($this->product->quantity > 0) {
                            ////////////////////////////////
                            if ($this->product->quantity > $this->quantityCount) {
                                // Insert product
                                // dd('product without color');
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    // 'product_color_id' => NULL,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => "Product Added To Cart",
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                                return true;
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => "Only {$this->product->quantity} Qauntity Available",
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                                return false;
                            }
                            ////////////////////////////
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'error',
                                'status' => 404
                            ]);
                            return false;
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exists',
                    'type' => 'error',
                    'status' => 404
                ]);
                return false;
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'You are not authenticated',
                'type' => 'error',
                'status' => 401
            ]);
            return false;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            "category" => $this->category,
            "product" => $this->product,
        ]);
    }
}
