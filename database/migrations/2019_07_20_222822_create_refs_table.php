<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //     Schema::create('refs', function (Blueprint $table) {
    //         $table->primary('id');
    //         $table->string('skill');
    //         $table->string('comp');
    //         $table->string('level');
    //         $table->timestamps();
    //     });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refs');
    }
}
