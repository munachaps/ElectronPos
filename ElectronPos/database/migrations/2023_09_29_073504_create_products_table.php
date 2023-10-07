<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {       
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('barcode')->unique();
            $table->text('description')->nullable();
            $table->integer('unit_of_measurement')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->boolean('status')->default(true);
            $table->enum('status', ['Yes', 'No']);
            $table->foreign('category_id')->references('id')->on('categories'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
