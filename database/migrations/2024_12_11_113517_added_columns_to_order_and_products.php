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
        
        Schema::table('orders',function (Blueprint $table){
            $table->integer('quantity')->default(1);
            $table->string('status')->default('Pending');
            $table->decimal('total_amount',10,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_and_products', function (Blueprint $table) {
            //
        });
    }
};
