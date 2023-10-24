<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
      
        return view('livewire.cart-count-component');
    }
}
