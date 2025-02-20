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
            $table->foreignId('category_id');
            $table->string('photo');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained('user');
        //     $table->foreignId('product_id')->constrained('products');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
