<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRiderIdToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'rider_id')) {
                $table->unsignedBigInteger('rider_id')->nullable();
                $table->foreign('rider_id')->references('id')->on('riders')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['rider_id']);
            $table->dropColumn('rider_id');
        });
    }
}
