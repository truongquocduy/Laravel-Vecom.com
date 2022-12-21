<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('trademark',16);
            $table->string('image',32);
            $table->text('thumbnails');
            $table->string('slug',128);
            $table->integer('price');
            $table->integer('cost');
            $table->integer('instock');
            $table->float('rating');
            $table->text('intro')->nullable();
            $table->text('details')->nullable();
            $table->text('material')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('products');
    }
}
