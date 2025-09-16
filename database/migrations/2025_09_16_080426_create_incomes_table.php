<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('income_id')->nullable(); // ID поступления
            $table->decimal('amount', 15, 2)->nullable(); // Сумма поступления
            $table->dateTime('income_date')->nullable(); // Дата поступления
            $table->string('source')->nullable(); // Источник
            $table->json('raw_data')->nullable(); // Сырые данные
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
