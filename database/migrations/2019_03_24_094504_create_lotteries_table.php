<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('');
            $table->integer('console_type')->default(0);//0 - xbox, 1 - ps4, 2 - pc
            $table->string('lot_type')->default(0);//0 - card, 1 - coins, 2 - other
            $table->string('game_type')->default(0);//0 - NHL,1 - NBA, 2 - FIFA
            $table->double('base_price')->default(0);
            $table->integer('base_discount')->default(0);
            $table->integer('places')->default(1);
            $table->integer('winner_id')->nullable();
            $table->integer('occupied_places')->default(0);
            $table->integer('next_lottery_id')->nullable();
            $table->integer('prev_lottery_id')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('is_only_one')->default(false);
            $table->boolean('completed')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('lifetime')->default(0);//0 - unlimited, 1 - 12, 2 - 24, 3 - 36...



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
        Schema::dropIfExists('lotteries');
    }
}
