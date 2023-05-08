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
        Schema::create('Urunler', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('urun_name');
            $table->string('urun_slug');
            $table->string('urun_code');
            $table->string('urun_qty');
            $table->string('urun_tags')->nullable();
            $table->string('urun_size')->nullable();
            $table->string('urun_color')->nullable();
            $table->string('satis_fiyat');
            $table->string('indirimli_fiyat')->nullable();
            $table->text('kisa_tanim');
            $table->text('uzun_tanim');
            $table->string('urun_thambnail');
            $table->string('satici_id')->nullable();
            $table->integer('sicak_firsat')->nullable();
            $table->integer('ozellik')->nullable();
            $table->integer('ozel_teklif')->nullable();
            $table->integer('ozel_firsat')->nullable();
            $table->integer('status')->default(0); 
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
        Schema::dropIfExists('Urunler');
    }
};
