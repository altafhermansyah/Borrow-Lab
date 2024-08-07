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
        Schema::create('item_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('item_categories');
    }
};
