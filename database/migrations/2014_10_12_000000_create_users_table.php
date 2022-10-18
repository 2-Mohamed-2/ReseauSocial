<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('grade_id')->constrained()
                    ->onUpdate('cascade')->onDelete('cascade')->nullable();

            $table->string('matricule')->unique();
            $table->string('numeroci')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('nomcomplet')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->date('datearrive')->nullable();
            $table->string('photo')->nullable(); 
            $table->string('genre')->nullable(); 
            $table->date('datedepart')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
            
        });

        $data = User::find(1);

        if (empty($data)) {
            $user            = new User();
            $user->grade_id = '1';
            $user->matricule = '1478';
            $user->email     = 'madou@mohamed.com';
            $user->password  = Hash::make('123456');
            $user->created_at = date('Y-m-d h:i:s');
            $user->save();
        }
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
