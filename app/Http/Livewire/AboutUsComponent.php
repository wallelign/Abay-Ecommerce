<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class AboutUsComponent extends Component
{
    public function render()
    {
        $products=Product::all();
        return view('livewire.about-us-component',['products'=>$products])->layout('layouts.base');
    }
}
