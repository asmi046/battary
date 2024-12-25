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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("parentid")->default(0)->comment("ID родительской категории");
            $table->integer("order")->default(0)->comment("Порядок сортировки");
            $table->string("name", 200)->comment("Имя категории");
            $table->string("slug", 200)->comment("Slug категории");
            $table->text('description')->nullable()->comment('Описание');
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('categories');
    }
};
