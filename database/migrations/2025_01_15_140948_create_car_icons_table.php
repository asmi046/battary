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
        Schema::create('car_icons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('img')->comment('Иконка');
            $table->string('title')->comment('Марка');
            $table->integer('order')->default(0)->comment('Порядок сортировки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_icons');
    }
};
