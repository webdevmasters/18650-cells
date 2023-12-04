<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cells', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("model",64);
            $table->string("brand",64);
            $table->integer("capacity");
            $table->integer("tested_capacity");
            $table->integer("resistance")->nullable();
            $table->string("discharge_current")->nullable();
            $table->unsignedBigInteger('wrap_color_id')->nullable();
            $table->unsignedBigInteger('ring_color_id')->nullable();
            $table->foreign('wrap_color_id')->references('id')->on('colors');
            $table->foreign('ring_color_id')->references('id')->on('colors');
            $table->integer("price");
            $table->boolean('sold')->default(false);
            $table->string('note')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cells');
    }
};
