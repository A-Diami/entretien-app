<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntretiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();
            $table->text('participants');
            $table->string('mail');
            $table->string('number');
            $table->text('presentation');
            $table->text('pourquoi_defarsci');
             $table->text('connaissance_defarsci');
             $table->text('part');
             $table->text('objectifs');
            $table->text('manques');
            $table->text('atouts');
            $table->string('dureeFormation');
            $table->date('dateDebut');
            $table->string('horaire_travail');
            $table->string('modalite_paiement');
            $table->string('mensualite');
            $table->text('demande');
            $table->boolean('maladie')->nullable()->default(false);
            $table->string('number_urgence');
            $table->mediumText('image')->nullable();
            $table->bigInteger('domaine_id')->unsigned();
            $table->timestamps();

            //$table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entretiens');
    }
}
