<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->nullable()->constrained('orders');
            $table->foreignId('id_product')->nullable()->constrained('products');
            $table->integer('total_price');
            $table->integer('total_amount');
            $table->integer('shipment');
            $table->enum('Status',['pendding','approval','Deny']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
};
