<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('promocodes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lifetime')->default(0);// 0 - 12, 1 - 24, 2 - 36, 3 - 48, 4 - 96, 5 - 128
            $table->boolean('isActive')->default(0);
            $table->string('title')->default("");
            $table->string('description',2000)->nullable()->default("");
            $table->integer('activation_count')->default(0);
            $table->integer('count')->default(0);
            $table->double('money')->default(0);
            $table->integer('exp')->default(0);
            $table->integer('discount')->default(0);

            $table->unsignedInteger("items_id" )->nullable();
            $table->unsignedInteger("cards_id" )->nullable();
            $table->unsignedInteger("images_storage_id" )->nullable();//promocode logo

            $table->foreign('items_id')->references('id')->on('items');
            $table->foreign('cards_id')->references('id')->on('cards_storage');
            $table->foreign('images_storage_id')->references('id')->on('images_storage');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
}
