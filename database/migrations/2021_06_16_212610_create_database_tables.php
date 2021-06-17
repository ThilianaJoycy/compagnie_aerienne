<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compagnie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom')->unique();
        });

        Schema::create('vol', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('dateDepart');
            $table->date('dateArrivee');
            $table->time('heureDepart', $precision=0);
            $table->time('heureArrivee', $precision=0);
            $table->boolean('statut');
            $table->integer('aeroport_depart_id');
            $table->integer('aeroport_arrive_id');
            $table->foreign('aeroport_depart_id')->references('id')->on('aeroport');
            $table->foreign('aeroport_arrive_id')->references('id')->on('aeroport');
        });

        Schema::create('aeroport', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom');
        });

        Schema::create('ville', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom');
           
        });

        Schema::create('escale', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           
            $table->time('heureArrivee', $precision=0);
            $table->time('heureDepart', $precision=0);
            
        });

        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('email')->unique();
        });

        Schema::create('passager', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom')->unique();
            $table->string('prenom');
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('dateReservation');
            $table->string('numero')->unique();
            $table->enum('statut', ['En attente', 'Confirmée', 'Annulée']);
            $table->integer('client_id');
            $table->integer('passager_id');
            $table->integer('vol_id');
            $table->foreign('client_id')->references('id')->on('client');
            $table->foreign('passager_id')->references('id')->on('passager');
            $table->foreign('vol_id')->references('id')->on('vol');
        });

        Schema::create('escale_vol', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('escale_id');
            $table->integer('vol_id');
            $table->foreign('vol_id')->references('id')->on('vol');
            $table->foreign('escale_id')->references('id')->on('escale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compagnie');
        Schema::dropIfExists('reservation');
        Schema::dropIfExists('vol');
        Schema::dropIfExists('aeroport');
        Schema::dropIfExists('ville');
        Schema::dropIfExists('escale');
        Schema::dropIfExists('client');
        Schema::dropIfExists('passager');
        Schema::dropIfExists('escale_vol');
    }
}
