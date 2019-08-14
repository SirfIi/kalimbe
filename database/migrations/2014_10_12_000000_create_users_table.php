<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users', function (Blueprint $table) {
    //        $table->bigIncrements('id');
    //        $table->string('name');
    //        $table->string('secteur');
    //        $table->string('description');
    //        $table->string('taille');
    //$table->softDeletes(); 
    //        $table->string('email')->unique();
    //        $table->string('site')->unique();
    //        $table->string('tel')->unique();

    //        $table->string('adresse');
    //        $table->string('ville');
    //        $table->string('pays');
           
    //        $table->timestamp('email_verified_at')->nullable();
    //        $table->string('password');
    //        $table->rememberToken();
    //        $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
