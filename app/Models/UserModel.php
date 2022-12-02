<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $fillable = ['group_id','name','phone','email','address'];

    protected $table = 'users';

    public function group(){

        return $this->hasOne(Group::class,'group_id','group_id');
    }

    public function sales(){
        return $this->hasMany(SaleInvoice::class, 'user_id', 'id');
    }
    public function purchases(){
        return $this->hasMany(PurchasesInvoice::class, 'user_id', 'id');
    }
     public function payments(){
         return $this->hasMany(Payment::class, 'user_id', 'id');
     }
     public function receipts(){
        return $this->hasMany(Receipt::class, 'user_id', 'id');
    }
    
    

    
}
