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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order')->default(1)->comment('Порядок вывода');
            $table->string('name')->comment('Название магазина');
            $table->string('city')->comment('Город');
            $table->string('adress')->comment('Адрес');
            $table->string('geo')->comment('Координаты');
            $table->string('phone')->comment('Телефон');
            $table->string('email')->nullable()->comment('e-mail');
            $table->boolean('aproved')->default(false)->comment('Рекомендуемый');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
