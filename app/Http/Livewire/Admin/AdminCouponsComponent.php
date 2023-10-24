<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($coupon_Id){
           $coupon=Coupon::find($coupon_Id);
           $coupon->delete();
           session()->flash('message',"coupon has been deleted Successfully");
    }
    public function render()
    {
        $coupons=Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
