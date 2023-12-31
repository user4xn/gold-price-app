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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('transaction_id');
            $table->tinyInteger('qty');
            $table->text('example_images')->nullable();
            $table->integer('product_weight')->nullable();
            $table->enum('product_type', ['Cincin Kawin','Cincin','Gelang','Kalung','Giwang/Anting','Liontin','Pin','Lainnya'])->nullable();
            $table->enum('gold_rate', ['5K','6K','8K','10K','12K','13K','14K','18K','21K','22K','23K','24K'])->nullable();
            $table->string('stone_type')->nullable();
            $table->integer('stone_weight')->nullable();
            $table->integer('ring_size')->nullable();
            $table->string('name_graph')->nullable();
            $table->enum('finishing_color', ['Kuning 24', 'Kuning 22', 'Rose Gold', 'Black/Navi'])->nullable();
            $table->enum('payment', ['Saldo EmasNu', 'Cash'])->nullable();
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
        Schema::dropIfExists('transaction_details');
    }
};
