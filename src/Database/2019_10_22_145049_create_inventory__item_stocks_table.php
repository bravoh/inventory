<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory__stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->double('opening_quantity')->default(0);
            $table->double('quantity')->default(0);
            $table->double('closing_quantity')->default(0);
            $table->string('type')->default('+');//or -
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('inventory__items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory__stocks');
    }
}
