<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable(); // Артикул товара
            $table->string('warehouse')->nullable(); // Склад
            $table->integer('quantity')->nullable(); // Количество
            $table->date('stock_date')->nullable(); // Дата склада (обычно сегодня)
            $table->json('raw_data')->nullable(); // Сырые данные
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
