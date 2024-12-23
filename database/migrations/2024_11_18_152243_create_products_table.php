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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 500)->comment("Наименование товара");
            $table->string('slug', 700)->unique()->comment("Ссылка");
            $table->string('img', 700)->nullable()->comment("Изображение");
            $table->float('old_price', 8, 2)->nullable()->comment("Старая Цена");
            $table->float('price', 8, 2)->comment("Цена");
            $table->integer('amperage')->nullable()->comment('Ток (EN)');
            $table->float('height', 6, 2)->nullable()->comment('Высота');
            $table->float('width', 6, 2)->nullable()->comment('Ширина');
            $table->float('length', 6, 2)->nullable()->comment('Длинна');
            $table->float('volume', 6, 2)->nullable()->comment('Емкость');
            $table->integer('clem_location')->nullable()->nullable()->comment('Расположение клемм');
            $table->integer('voltage')->nullable()->comment('Вольтаж');
            $table->boolean('{{popular}}')->defaulr(false)->comment('Популярный товар');
            $table->string('type', 70)->nullable()->comment('Тип');
            $table->json('galery')->nullable()->comment('Галерея изображений');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
