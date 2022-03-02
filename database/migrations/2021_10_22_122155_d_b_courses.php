<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DBCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('acronym',10);
            $table->string('title',100);
            $table->integer('ects');
            $table->integer('hours');
            $table->integer('quad');
            $table->string('opt',3);
            $table->primary('acronym');
        });
        DB::statement('ALTER TABLE courses ADD CONSTRAINT quadCheck check (quad>0 and quad<=6);');
        DB::statement("ALTER TABLE courses ADD CONSTRAINT optCheck check (opt in ('R', 'I', 'G', 'GIR', 'IR'));");
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
