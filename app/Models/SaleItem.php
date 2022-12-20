<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'sales_invoice_id', 'quantity', 'price', 'total'];

    public function invoice(){
        return $this->belongsTo(SaleInvoice::class);
    }

    public function receipts(){
        return $this->hasOne(Receipt::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
