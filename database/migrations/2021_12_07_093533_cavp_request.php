<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CavpRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cavp_request', function (Blueprint $table) {;
            $table->id();
            $table->string('demande',1000);
            $table->string('type');
            $table->integer('student');
            $table->string('reponse',1000)->nullable();
            $table->foreign('student')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
