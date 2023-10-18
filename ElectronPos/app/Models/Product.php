<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;    
    protected $fillable = [
        'name',
        'barcode',
        'description',
        'price',
        'unit_of_measurement',
        'quantity',
        'category_id',
        'product_status',
        'selling_price',
        'markup'
    ];


    public function stock()
{
    return $this->hasOne(Stock::class);
}
}
