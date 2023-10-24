<?php

namespace App\Http\Livewire;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;
    
    public function mount(){
        $this->sorting='defualt';
        $this->pagesize=12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store( $product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in the cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
         if($this->sorting=='date'){
            $products=product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
         }
         else if($this->sorting=='price'){
             $products=product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
         }
         else if($this->sorting='price-desc'){
            $products=product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
         }
         else{
         $products=product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
         }
         $categories=Category::all();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}

