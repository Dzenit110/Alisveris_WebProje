<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siparis_id');
            $table->foreign('siparis_id')->references('id')->on('siparis')->onDelete('cascade');
            $table->unsignedBigInteger('urun_id');
            $table->string('satici_id')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('qty');
            $table->float('fiyat',8,2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparis_items');
    }
};
