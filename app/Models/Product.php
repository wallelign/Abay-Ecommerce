<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    Protected $table="products";
    protected $fillable=['name'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }
    public function subCategory(){
        return $this->belongTo(Subcategory::class,'subcategory_id');
    }
    public function AttributeValues(){
        return $this->hasMany(AttributeValue::class,'product_id');
    }
}
