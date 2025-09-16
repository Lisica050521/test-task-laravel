<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Уникальный ID записи
            $table->string('external_id')->nullable(); // ID из внешнего API (если есть)
            $table->decimal('amount', 15, 2)->nullable(); // Сумма продажи
            $table->string('currency')->nullable(); // Валюта
            $table->dateTime('sale_date')->nullable(); // Дата и время продажи
            $table->json('raw_data')->nullable(); // Сырые данные на случай, если структура изменится
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
