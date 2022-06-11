<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->code = $coupon->code;
        $coupon->type = $coupon->type;
        $coupon->value = $coupon->value;
        $coupon->cart_value = $coupon->cart_value;
        $coupon->coupon_id = $coupon->coupon_id;
        $coupon->expiry_date = $coupon->expiry_date;
    }

    public function updated($fileds)
    {
        $this->validateOnly($fileds,[
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([            
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
        $coupon = Coupon::find($this->coupon_id);        
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon has been updated successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.base');
    }
}
