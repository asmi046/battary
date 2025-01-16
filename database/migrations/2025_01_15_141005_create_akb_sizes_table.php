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
        Schema::create('akb_sizes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('height', 6, 2)->comment('Высота');
            $table->float('width', 6, 2)->comment('Ширина');
            $table->float('length', 6, 2)->comment('Длинна');
            $table->string('type', 70)->nullable()->comment('Тип');
            $table->integer('order')->default(0)->comment('Порядок сортировки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akb_sizes');
    }
};
