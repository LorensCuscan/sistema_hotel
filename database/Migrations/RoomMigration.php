<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
class RoomMigration extends Migration
{
    public function up($capsule)
    {
        if (!$capsule::schema()->hasTable('rooms')){
            $capsule::schema()->create('rooms', function ($table){ 
                $table->increments('id'); 
                $table->string('name', 100);
                $table->float('price', 6, 2);
                $table->tinyInteger('class');
                $table->timestamps(); 
            });
        }
    }

    public function down($capsule){
        $capsule::schema()->dropIfExists('rooms');
    }
}
