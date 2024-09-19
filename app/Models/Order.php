<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_number', 'product_id', 'quantity', 'total_price', 'status'];

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
