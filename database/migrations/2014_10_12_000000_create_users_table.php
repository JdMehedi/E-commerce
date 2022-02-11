<?php

use Illuminate\Support\Facades\Schema;
use App\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('contact')->nullable();
            $table->string('fax')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('gender')->nullable();
            $table->string('DOB')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('hashval')->nullable();
            $table->integer('status')->nullable();
            $table->string('same_as')->nullable();
            $table->string('module_id')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert(
            array(
                array(

                    'fname' => 'admin',
                    'email' => 'admin@test.com',
                    'status' => 1,
                    'password' => '$2y$10$46Y2SPvnA.GIejLuevj5Q.x/oHV8.nAcv/pMNC6wWZ3Cjjq3iw9A2',
                    'created_at' => '2020-01-01 00:00:00',
                    'updated_at' => '2020-01-01 00:00:00'
                )
            )
        );
        

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
