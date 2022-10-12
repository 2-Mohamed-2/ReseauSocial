<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('grade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->string('matricule')->unique();
            $table->string('numeroci')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('nomcomplet');
            $table->string('adresse');
            $table->string('telephone');
            $table->date('datearrive');
            $table->string('photo'); 
            $table->string('genre'); 
            $table->date('datedepart');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
