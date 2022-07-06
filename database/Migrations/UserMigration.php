<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
class UserMigration extends RunMigration
{
    public function __construct($capsule)
    {
        $capsule::schema()->dropIfExists('users');

        $capsule::schema()->create('users', function ($table)
        { 
            $table->increments('id'); 
            $table->string('name', 100);
            $table->string('email')->unique(); 
            $table->string('password', 100);
            $table->boolean('admin');
            $table->timestamps(); 
        });
    }
}
