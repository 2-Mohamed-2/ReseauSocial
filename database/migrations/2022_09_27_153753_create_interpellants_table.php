<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterpellantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interpellants', function (Blueprint $table) {
            $table->id();
            $table->string("nomcomplet");
            $table->string("nompere");
            $table->string("nommere");
            $table->string("adresse");
            $table->string("telephone");
            $table->string("n_ci");
            $table->string("photo");
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
        Schema::dropIfExists('interpellants');
    }
}
