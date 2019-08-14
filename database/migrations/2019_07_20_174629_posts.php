<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('posts', function (Blueprint $table) {
        //     $table->primary('id');
        //     $table->string('titre');
        //     $table->string('Secteur');
        //     $table->string('localisation');
        //     $table->string('type_contrat');
        //     $table->string('remuneration');
        //     $table->string('mobilite');
        //     $table->string('date_exp');
        //     $table->string('domaine_etude');
        //     $table->string('diplome');
        //     $table->string('niveau_etude');
        //     $table->string('annee_exp');
        //     $table->string('certif');
        //     $table->string('nationalite');
        //     $table->string('description');
        //     $table->string('responsibilities');
        //     $table->string('status');
        //     $table->integer('id_ent');
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
        // 
    }
}
