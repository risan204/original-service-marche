<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('size');
            $table->string('area');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
            
            //外部キー制約(items)
            $table->foreign('user_id')->references('user_id')->on('items');
        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
