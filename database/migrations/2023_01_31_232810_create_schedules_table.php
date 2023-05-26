<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('abstract_start_date');
            $table->date('abstract_end_date');
            $table->date('presentation_start_date');
            $table->date('presentation_end_date');
            $table->date('paper_start_date');
            $table->date('paper_end_date');
            $table->date('conference_start_date');
            $table->date('conference_end_date');
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
        Schema::dropIfExists('schedules');
    }
}
