<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class AdminAddtCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public function updated($fields){
            $this->validateOnly($fields,[
                'code'=>'required|unique:coupons',
                'type'=>'required',
                'value'=>'required|numeric',
                'cart_value'=>'required|numeric',
                'expiry_date'=>'required'

            ]);
    }
    public function storeCoupons(){
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        
        ]);
       $coupon=new Coupon();
       $coupon->code=$this->code;
       $coupon->type=$this->type;
       $coupon->value=$this->value;
       $coupon->cart_value=$this->cart_value;
       $coupon->expiry_date=$this->expiry_date;
       $coupon->save();
       session()->flash('message',"coupons has been created successfully");

    }

    public function render()
    {
        return view('livewire.admin.admin-addt-coupon-component')->layout('layouts.base');
    }
}
