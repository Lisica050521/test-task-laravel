<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable(); // Номер заказа
            $table->string('status')->nullable(); // Статус заказа
            $table->decimal('total_price', 15, 2)->nullable(); // Общая сумма
            $table->dateTime('order_date')->nullable(); // Дата заказа
            $table->json('raw_data')->nullable(); // Сырые данные
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
