<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('title',255);
            $table->string('abstract',255)->nullable();
            $table->string('fullpaper',255)->nullable();
            $table->string('powerpoint',255)->nullable();
            $table->string('payment',255)->nullable();
            $table->enum('payment_status',['paid', 'unpaid'])->nullable();
            $table->enum('abstract_status',['submitted','under review','accepted','revision','rejected'])->nullable();
            $table->enum('paper_status',['submitted','under review','accepted','revision','rejected'])->nullable();
            $table->integer('paper_attribute');
            $table->year('year')->nullable();
            $table->string('country',50)->nullable();
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
        Schema::dropIfExists('paper');
    }
}
