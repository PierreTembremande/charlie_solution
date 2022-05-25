<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donnee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnees',function(Blueprint $table){
            $table->string('id',250);
            $table->string('sexe',250);
            $table->string('titre', 10);
            $table->string('prenom', 250);
            $table->string('nom', 250);
            $table->date('date_de_naissance');
            $table->integer('age');
            $table->string('nationalite', 2);
            $table->string('telephone_fixe', 12);
            $table->string('telephone_portable', 12);
            $table->string('email', 250);
            $table->string('pseudo', 250);
            $table->string('mdp', 64);
            $table->date('date_enregistrement');
            $table->integer('fk_img');
            $table->integer('fk_ville');
            $table->integer('fk_etat');
            $table->timestamps();

            
            $table->foreignId('images_id')->constrained();
            $table->foreignId('villes_id')->constrained();
            $table->foreignId('etats_id')->constrained();

        });
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
