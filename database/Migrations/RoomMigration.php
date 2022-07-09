<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
class RoomMigration extends RunMigration
{
    public function __construct($capsule)
    {
        $capsule::schema()->dropIfExists('rooms');

        $capsule::schema()->create('rooms', function ($table)
        { 
            $table->increments('id'); 
            $table->string('name', 100);
            $table->float('price', 4, 2);
            $table->tinyInteger('class');
            $table->timestamps(); 
        });
    }
}