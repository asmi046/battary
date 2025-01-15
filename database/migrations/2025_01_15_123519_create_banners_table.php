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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('img')->comment('Изображение');
            $table->string('title')->comment('Заголовок');
            $table->string('sub_title')->nullable()->comment('подзаголовок');
            $table->string('lnk_text')->nullable()->comment('Текст кнопки');
            $table->string('lnk')->nullable()->comment('Ссылка для кнопки');
            $table->integer('order')->default(0)->comment('Порядок сортировки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
