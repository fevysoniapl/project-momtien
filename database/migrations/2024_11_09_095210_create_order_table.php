<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_item_id');
            $table->integer('user_id');
            $table->integer('quantity');
            $table->enum('status', ['Menunggu Pembayaran', 'Pesanan Diterima', 'Sedang Dimasak', 'Pesanan Selesai']);
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
