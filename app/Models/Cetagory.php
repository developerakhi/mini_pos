<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cetagory extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function products(){

        return $this->hasOne(Product::class, 'id', 'categories_id');
    }

    public static function arrayForSelect(){
        $arr = [];
        $categories = Cetagory::all();
        foreach($categories as $category){
            $arr[$category->id] = $category->title ;
        }
        return $arr;
    }
}
