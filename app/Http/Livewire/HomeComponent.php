<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\Sale;
use Cart;
class HomeComponent extends Component
{
    public function render()
    {
        $sliders=HomeSlider::where('status',1)->get();
        $lproducts=Product::orderBy('created_at','DESC')->get()->take(8);
        $category=HomeCategory::find(1);
        $cats=explode(',',$category->sel_categories);
        $categories=Category::whereIn('id',$cats)->get();
        $no_of_products=$category->no_of_products;
        $sproducts=Product::where('sale_price','>',1)->inRandomOrder()->get()->take(8);
        $sales=Sale::find(1);

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        
        return view('livewire.home-component',['sliders'=>$sliders,'lproducts'=>$lproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts,'sales'=>$sales])->layout('layouts.base');
    }
}
