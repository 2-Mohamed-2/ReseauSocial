<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();

          //  $table->foreignId('inconnu_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();

            $table->string('n_delivrance');
            $table->string('village_de');
            $table->string('franction_de');
            $table->string('nationalite');
            $table->string('nom');
            $table->string('prenom');
            $table->string('fils_de');
            $table->string('et_de');
            $table->string('ne_le');
            $table->string('a');
            $table->string('photo');
            $table->string('profession');
            $table->string('domicile');
            $table->string('taille');
            $table->string('teint');
            $table->string('cheveux');
            $table->string('signes');
            $table->integer('carte_n');
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
        Schema::dropIfExists('cartes');
    }
}
