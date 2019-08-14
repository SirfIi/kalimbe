<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefCandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_cands', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->integer('id_post');
            // $table->integer('id_cand');
            // $table->string('skill');
            // $table->string('comp');
            // $table->string('level');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_cands');
    }
}
