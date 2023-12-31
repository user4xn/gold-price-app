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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_images');
            $table->enum('product_unit', ['g', 'kg']);
            $table->integer('product_weight');
            $table->enum('product_category', ['LM ANTAM','LD 999.9','Cucian / 999','Koin Dinar 999.9','Koin Dinar 917','Perhiasan 24k','Perhiasan 750 (18k) Emas Putih','Perhiasan 750 (18k) Emas Kuning','Perhiasan 700','Perhiasan 14k','Perhiasan 420 Putih','Perhiasan 420 Kuning','Perhiasan 375 Putih','Perhiasan 375 Kurning','Pin dan Aksesoris','Berlian','Perak'])->nullable();
            $table->enum('product_type', ['Cincin Kawin','Cincin','Gelang','Kalung','Giwang/Anting','Liontin','Pin','Lainnya']);
            $table->string('product_price');
            $table->enum('gold_rate', ['5K','6K','8K','10K','12K','13K','14K','18K','21K','22K','23K','24K']);
            $table->string('stone_type')->nullable();
            $table->integer('stone_weight')->nullable();
            $table->integer('ring_size')->nullable();
            $table->integer('stock')->nullable();
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
        Schema::dropIfExists('products');
    }
};
