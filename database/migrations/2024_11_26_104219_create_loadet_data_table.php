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
        Schema::create('loadet_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sku', 30)->comment('Артикул');
            $table->string('title')->comment('Артикул');
            $table->string('brand')->nullable()->comment('Бренд');
            $table->string('group')->nullable()->comment('Группа АКБ');
            $table->string('emkost')->nullable()->comment('Емкость');
            $table->string('tok')->nullable()->comment('Ток');
            $table->string('gabarits')->nullable()->comment('Габариты');
            $table->string('type_clem')->nullable()->comment('Тип клемм');
            $table->string('ves')->nullable()->comment('Вес');
            $table->string('nap')->nullable()->comment('Напряжение');
            $table->string('polarnost')->nullable()->comment('Полярность');
            $table->string('producer')->nullable()->comment('Производитель');
            $table->string('tovar_type')->nullable()->comment('Тип товара');
            $table->integer('nal')->nullable()->comment('Наличие');
            $table->float('price', 6,2)->comment('Цена');
            $table->string('shop')->comment('магазин');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loadet_data');
    }
};
