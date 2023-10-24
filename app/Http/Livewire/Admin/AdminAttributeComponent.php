<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class AdminAttributeComponent extends Component
{

     public function deleteProductAttribute($attribute_id){
        $proattribute=ProductAttribute::find($attribute_id);
        $proattribute->delete();
        session()->flash('message',"Attribute has been deteted Successfully");
     }
    public function render()
    {
        $pattributes=ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attribute-component',['pattributes'=>$pattributes])->layout('layouts.base');
    }
}
