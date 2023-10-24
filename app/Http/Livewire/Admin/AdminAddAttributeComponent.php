<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;
class AdminAddAttributeComponent extends Component
{
    public $name;

    public function update($fileds){
    $this->validateOnly($fileds,[
        'name'=>'required'
    ]);
    }
    
    public function storeAttribute(){
        $this->validate([
            'name'=>'required'
        ]);
        $pattribute=new ProductAttribute();
        $pattribute->name=$this->name;
        $pattribute->save();
        session()->flash('message',"product attribute has been saved successfully");
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attribute-component')->layout('layouts.base');
    }
}
