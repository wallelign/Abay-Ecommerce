<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    
    public $min_price;
    public $max_price;
    public function mount(){
        $this->sorting='defualt';
        $this->pagesize=12;

        $this->min_price=1;
        $this->max_price=100000;
    }

    public function store( $product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in the cart');
        return redirect()->route('product.cart');
    }
    public function productWishlist( $product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
       $this->emitTo('whishlist-count-component','refreshComponent');
    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
        if($witem->id== $product_id){
            Cart::instance('wishlist')->remove($witem->rowId);
        $this->emitTo('whishlist-count-component','refreshComponent');
        return;
        }
        }
    }
    use WithPagination;
    public function render()
    {
        
         if($this->sorting=='date'){
            $products=product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
         }
         else if($this->sorting=='price'){
             $products=product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
         }
         else if($this->sorting='price-desc'){
            $products=product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
         }
         else{
         $products=product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
         }
         $categories=Category::all();

         if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
