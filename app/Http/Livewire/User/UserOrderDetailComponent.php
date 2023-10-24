<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Order;
class UserOrderDetailComponent extends Component
{
    public  $order_id;

    public function mount($order_id){
        $this->order_id=$order_id;
    }
    public function cancelOrder(){
        $order=Order::find($this->order_id);
        $order->status="canceled";
        $order->cancelled_date=DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message',"ordered has been cancelled Succesfully");
    }
    public function render()
    {
       $orders=Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-detail-component',['order'=>$orders])->layout('layouts.base');
    }
}
