<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToInventoryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory__stocks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->string('reason')
                ->nullable()
                ->after('type');
//            try{
//                $table->foreign('user_id')
//                    ->references('id')
//                    ->on(config('inventory-config.users_table'))
//                    ->onUpdate('cascade')
//                    ->onDelete('cascade');
//            }catch (\Exception $exception){
//                \Log::error($exception);
//            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory__stocks', function (Blueprint $table) {
            $table->dropColumn(['user_id','reason']);
        });
    }
}
