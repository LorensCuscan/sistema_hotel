<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
class UserMigration extends Migration
{
    public function up($capsule)
    {
        if (!$capsule::schema()->hasTable('users'))
        {
            $capsule::schema()->create('users', function ($table){ 
                $table->increments('id'); 
                $table->string('name', 100);
                $table->string('email')->unique(); 
                $table->string('password', 100);
                $table->boolean('admin');
                $table->timestamps();
            });
        }
    }

    public function down($capsule){
        $capsule::schema()->dropIfExists('users');
    }
}
