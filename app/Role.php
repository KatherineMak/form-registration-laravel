<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
