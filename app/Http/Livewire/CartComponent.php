<?php

namespace App\Http\Livewire;

use App\Http\Livewire\session;
use Livewire\Component;
use Carbon\Carbon;
use Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
class CartComponent extends Component
{ 
  public $haveCouponCode;
  public $couponCode;
  public $discount;
  public $subtotalAfterDiscount;
  public $taxAfterDiscount;
  public $totalAfterDiscount;
    public function increaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
        
    }
    public function decreaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty -1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll(){
          Cart::instance('cart')->destroy();
          $this->emitTo('cart-count-component','refreshComponent');
    }
    public function saveforLater($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($item->id,'$item->name',1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been save for later'); 
      }
      public function moveToCart($rowId){
        $item=Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id,'$item->name',1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been moved to cart'); 
      }
      public function deleteItemInSavetolater($rowId){
        Cart::instance('saveforlater')->remove($rowId);
        session()->flash('success_message',"Item has been removed in save for later");
      }

      public function applyCoupon(){
        // in this project subtotal must be greated than or equal to coupon cart_value
        // coupon cart_value must be greater or equal to subtotal+tax(only subtotal);////////be true

        $coupon=Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','>=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
          session()->flash('coupon_message',"Coupon Code is invalid!");
          return;
        }
        session()->put('coupon',[
          'code'=>$coupon->code,
          'type'=>$coupon->type,
          'value'=>$coupon->value,
          'cart_value'=>$coupon->cart_value
        ]);
      }

      public function calculateDiscount(){
        if(session()->has('coupon')){
          if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount=(Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) /10000;
          }
          else{
             $this->discount=(Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 1000;
          }
           $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
           $this->taxAfterDiscount=($this->subtotalAfterDiscount * config('cart.tax')) / 100;
           $this->totalAfterDiscount=$this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
      }
      public function removeCoupon(){
            session()->forget('coupon');
      }

      public function checkout(){
        if(Auth::check()){
          return redirect('checkout');
        }
        else{
          return redirect('login');
        }    
      }
      public function setAountsForCheckout(){

        if(!Cart::instance('cart')->count() >0){
          session()->forget('checkout');
          return;
        }

        if(session()->has('coupon')){
          session()->put('checkout',[
            'discount'=>$this->discount,
            'subtotal'=>$this->subtotalAfterDiscount,
            'tax'=>$this->taxAfterDiscount,
            'total'=>$this->totalAfterDiscount
          ]);
        }
        else{
          session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal(),
            'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total()
          ]);
        }
      }

    public function render()
    {
    
      if(session()->has('coupon')){
       if(Cart::instance('cart')->subtotal() > session()->get('coupon')['cart_value']){
        session()->forget('coupon');
       }
       $this->calculateDiscount();
      }
      $this->setAountsForCheckout();

      if(Auth::check()){
        Cart::instance('cart')->store(Auth::user()->email);
    }
    
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
