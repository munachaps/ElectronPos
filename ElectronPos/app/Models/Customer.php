<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /*

      $table->id();
            $table->string('customer_name');
            $table->string('code');
            $table->unsignedBigInteger('user_id');
            $table->string('customer_taxnumber')->unique();
            $table->string('customer_city')->unique();
            $table->string('customer_address')->unique();
            $table->string('customer_phonenumber')->unique();
            $table->foreign('user_id')->references('id')->on('customers');
            $table->timestamps();
    */

    protected $fillable = [
        'code',
        'customer_name',
        'customer_address',
        'customer_phonenumber',
        'customer_taxnumber',
        'customer_city',
        'customer_address',
        'customer_phonenumber',
        'user_id'
    ];

}
