<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id,$status){
            $order=Order::find($order_id);
            $order->status=$status;
            if($status=="delivered"){
                $order->delivered_date=DB::raw('CURRENT_DATE');
            }
            else if($status == "canceled"){
                $order->cancelled_date=DB::raw('CURRENT_DATE');
            }
            $order->save();
            session()->flash('order_message',"Order has been Successfully Updated");
    }
    public function render()
    {
        $orders=Order::orderBy('created_at','desc')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
