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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->unsignedFloat('total');
            $table->string('rfc');
            $table->unsignedBigInteger('id');
            $table->timestamps();
            $table->date('created')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rfc')->references('id')->on('customers');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
