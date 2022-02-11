<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_id');
            $table->string('ctactnumber');
            $table->string('guarnumber');


//
//            $table->text('name')->nullable();
//            $table->text('fname')->nullable();
//            $table->text('mname')->nullable();
//            $table->text('address')->nullable();
//            $table->text('department')->nullable();
//            $table->text('degree')->nullable();
//            $table->text('cnumber')->nullable();
//            $table->text('roomno')->nullable();
//            $table->text('block')->nullable();
//            $table->text('btype')->nullable();
//            $table->text('birth_date')->nullable();
//            $table->text('gender')->nullable();
//            $table->text('religion')->nullable();
//            $table->text('districts')->nullable();
//            $table->text('blood_group')->nullable();
//            $table->string('photo')->nullable();


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
        Schema::dropIfExists('profile_models');
    }
}
