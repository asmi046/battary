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
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 70)->comment('Тип');
            $table->string('brand', 70)->comment('Марка авто');
            $table->string('model', 70)->comment('Модель авто');
            $table->string('modification', 100)->comment('Модификация авто');
            $table->integer('kW')->default(0)->comment('Мощьность kW');
            $table->integer('PS')->default(0)->comment('Мощьность PS');
            $table->string('varta_sku', 30)->comment('Артикул Varta');
            $table->string('base_down', 10)->comment('Тип нижнего крепления');
            $table->float('volume', 6, 2)->comment('Емкость');
            $table->string('box_size', 10)->nullable()->comment('Размер корпуса');
            $table->integer('amperage')->comment('Ток (EN)');
            $table->float('height', 6, 2)->comment('Высота');
            $table->float('width', 6, 2)->comment('Ширина');
            $table->float('length', 6, 2)->comment('Длинна');
            $table->integer('clem_location')->nullable()->comment('Расположение клемм');
            $table->integer('clem_type')->nullable()->comment('Тип клемм');
            $table->integer('voltage')->comment('Вольтаж');
            $table->float('mass')->nullable()->comment('Масса');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
