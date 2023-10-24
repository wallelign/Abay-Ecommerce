<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deletecategory($id){
        $category=Category::find($id);
        $category->delete();
        session()->flash('message',"Category has been deleted Successfully");
    }
    public function deleteSubcategory($id){
        $subcategory=Subcategory::find($id);
        $subcategory->delete();
        session()->flash('subcategory_message',"Subcategory has been succesfuly deleted");
    }
    public function render()
    {
     $categories=Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
