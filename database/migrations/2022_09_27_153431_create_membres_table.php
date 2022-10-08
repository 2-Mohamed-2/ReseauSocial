<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::disableForeignKeyConstraints();
        Schema::create('membres', function (Blueprint $table) {
            $table->id();

            //$table->foreignId('section_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->string('matricule')->unique();
            $table->string('numeroci')->unique();
            $table->string('nomcomplet');
            $table->string('adresse');
            $table->string('telephone');
            $table->date('datearrive');
            $table->string('photo'); 
            $table->string('genre'); 
            $table->date('datedepart');
            $table->string('pwd');
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
        Schema::dropIfExists('membres');
    }
}
