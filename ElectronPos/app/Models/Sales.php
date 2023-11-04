<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $primaryKey = 'sale_id';

    public $incrementing = true;

    protected $fillable = [
        'total', 'rfc', 'id', 'created'
    ];

    public function client() {
        return $this->belongsTo('App\Customer', 'rfc');
    }

    // This model can exists in N carts
    public function carts() {
        return $this->belongsToMany('App\Cart', 'sales', 'sale_id',
                                    'sale_id', 'sale_id', 'sale_id')
            ;
    }

}

