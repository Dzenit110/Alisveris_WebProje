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
        Schema::create('siparis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bolum_id');
            $table->unsignedBigInteger('bolge_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress')->nullable();
            $table->string('post_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('odeme_type')->nullable();
            $table->string('odeme_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency');
            $table->float('miktar',8,2);
            $table->string('order_number')->nullable();
            $table->string('fatura_no');
            $table->string('siparis_tarih');
            $table->string('siparis_ay');
            $table->string('siparis_yil');
            $table->string('onay_tarih')->nullable();
            $table->string('processing_tarih')->nullable();
            $table->string('secilmis_tarih')->nullable();
            $table->string('sevk_tarih')->nullable();
            $table->string('teslim_tarih')->nullable();
            $table->string('iptal_tarih')->nullable();
            $table->string('iade_tarih')->nullable();
            $table->string('iade_sebep')->nullable();
            $table->string('status'); 
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
        Schema::dropIfExists('siparis');
    }
};
