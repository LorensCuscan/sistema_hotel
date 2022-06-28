<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        Capsule::schema()->create('users', function ($table)
        { 
            $table->increments('id'); 
            $table->string('email')->unique(); 
            $table->timestamps(); 
        });

    }
}
