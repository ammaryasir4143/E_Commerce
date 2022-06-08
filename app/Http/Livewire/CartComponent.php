<?php

namespace App\Http\Livewire;


use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth; 



class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->getremove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been deleted');
        
    }

    public function destroyAll()
    {
        Cart::instance('cart')->getdestroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }
    
    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('SaveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Products');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Products');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been saved for later');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from save for later');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
   






























































    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
         if(Auth::check())
    {
        return redirect()->route('checkout');
    }
        else
        {
        return redirect()->route('login');
        }
    }
     public function setAmountForCheckout()
     {
        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' =>$this->discount,
                'subtotal' =>$this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        }
            else
            {
                session()->put('checkout',[
                    'discount' => 0,
                    'subtotal' => Cart::instance('cart')->subtotal(),
                    'tax' => Cart::instance('cart')->tax(),
                    'total' => Cart::instance('cart')->total()
                ]);     
            }  
     }   
     public function render()
     {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculateDiscounts();
            }
        }
        $this->setAmountForCheckout()
        return view('livewire.cart-component')->layout("layouts.base");
     }
}