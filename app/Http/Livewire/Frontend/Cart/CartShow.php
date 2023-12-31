<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Decremented',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity cannot be less than 1',
                    'type' => 'error',
                    'status' => 200
                ]);
            }
        } else {



            $this->dispatchBrowserEvent('message', [

                'text' => 'Something Went Wrong!',

                'type' => 'error',

                'status' => 404

            ]);
        }
    }

    public function incrementQuantity($cartId)

    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        "text" => 'Quantity Incremented',
                        "type" => 'success',
                        "status" => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        "text" => "Only {$productColor->quantity} Available",
                        "type" => 'error',
                        "status" => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');

                    $this->dispatchBrowserEvent('message', [
                        "text" => 'Quantity Incremented',
                        "type" => 'success',
                        "status" => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        "text" => "Only {$cartData->product->quantity} Available",
                        "type" => 'error',
                        "status" => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                "text" => 'Something Went Wrong',
                "type" => 'error',
                "status" => 404
            ]);
        }
    }

    public function removeCartItem($cartId)
    {
        $cartToRemove = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartToRemove) {
            $cartToRemove->delete();
            $this->emit('CartAddedUpdated');
        } else {
            $this->dispatchBrowserEvent('message', [
                "text" => 'Something Went Wrong',
                "type" => 'error',
                "status" => 404
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
        ]);
    }
}
