<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use App\Models\Sale;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public $sattr=[];
    public function mount($slug){
        $this->slug=$slug;
        $this->qty=1;
    }
    public function store( $product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->sattr)->associate('App\Models\Product');
        session()->flash('success_message','Item added in the cart');
        return redirect()->route('product.cart');
    }
    public function increamentDetail(){
        $this->qty++;
    }
    public function decrementDetail(){
        if($this->qty >=1){
        $this->qty--;
        }
    }
    public function render()
    {
        $product=product::where('slug',$this->slug)->first();
        $popular_products=product::inRandomOrder()->limit(4)->get();
        $related_products=product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sales=Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products,'sales'=>$sales])->layout('layouts.base');
    }
}
