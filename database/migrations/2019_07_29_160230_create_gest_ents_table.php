<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestEntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('gest_ents', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nom');
        //     $table->string('email');
        //     $table->string('tel');
        //     $table->string('genre');
        //     $table->string('fonction');
        //     $table->string('type_gest');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gest_ents');
    }
}
