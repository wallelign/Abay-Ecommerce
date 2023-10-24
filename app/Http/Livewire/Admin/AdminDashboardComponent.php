<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;
class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders=Order::orderby('created_at','desc')->get()->take(10);
        $totalSales=Order::where('status','delivered')->count();
        $totalRevenu=Order::where('status','delivered')->sum('total');
        $todaySales=Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenu=Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',[
                                                       'orders'=>$orders,
                                                       'totalSales'=>$totalSales,
                                                       'totalRevenu'=>$totalRevenu,
                                                       'todaySales'=>$todaySales,
                                                       'todayRevenu'=>$todayRevenu
                                                       ])->layout('layouts.base');
    }
}
