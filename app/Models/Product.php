<?php

namespace App\Models;


use App\Models\Cetagory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory; 

    protected $fillable = ['title', 'description', 'catagories_id', 'cost_price', 'price'];

    public function category(){
        
        return $this->belongsTo(Cetagory::class,'categories_id', 'id');
    }

    public static function arrayForSelect(){
        $arr = [];
        $products = Product::all();
        foreach($products as $product){
            $arr[$product->id] = $product->title ;
        }
        return $arr;
    }
}
