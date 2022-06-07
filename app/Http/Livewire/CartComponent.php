<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->getupdate($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->getget($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->getupdate($rowId,$qty);
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->getremove($rowId);
        session()->flash('success_message','Item has been deleted');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->getdestroy();
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
