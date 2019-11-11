<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateParticipaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participaints', function (Blueprint $table) {
            //$table->string('email');
            $table->string('birthday')->nullable();
            $table->string('reportSubject')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('photo')->default("photo.png");
            $table->integer('hide')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participaints', function (Blueprint $table) {
            //
        });
    }
}
