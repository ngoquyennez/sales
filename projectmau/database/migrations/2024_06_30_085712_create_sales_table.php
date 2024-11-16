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
            $table->integerIncrements('sale_id');
            $table->unsignedInteger('medicine_id');//midecine_id
            $table->integer('quantity');
            $table->datetime('sale_date');
            $table->string('customer_phone');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines');
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
