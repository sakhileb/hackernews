<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table){
            $table->integer('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('username');
            $table->char('item_type', 20);
            $table->string('url')->nullable();
            $table->integer('time_stamp')->nullable();
            $table->integer('score')->nullable();
            $table->boolean('is_top')->nullable();
            $table->boolean('is_show')->nullable();
            $table->boolean('is_ask')->nullable();
            $table->boolean('is_job')->nullable();
            $table->boolean('is_new')->nullable();
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
