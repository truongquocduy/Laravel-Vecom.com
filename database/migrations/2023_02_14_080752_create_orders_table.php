<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('carts');
            $table->integer('quality');
            $table->double('status');
            $table->double('payment_status');
            $table->string('payment_method', 128);
            $table->string('address', 255);
            $table->string('phone', 16);
            $table->text('note')->nullable();
            $table->integer('total_price');
            $table->string('transit_status',128);
            $table->string('delivery_date',64);
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
        Schema::dropIfExists('orders');
    }
}
