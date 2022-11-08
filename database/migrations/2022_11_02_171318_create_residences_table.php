<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inconnu_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('numero');
            $table->string('certifions');
            $table->date('ne');
            $table->string('a');
            $table->string('fils');
            $table->string('et');
            $table->string('profession');
            $table->string('resulte');
            $table->string('domicile');
            $table->date('kati');
            $table->string('dossier');
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
        Schema::dropIfExists('residences');
    }
}
