<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule; 
use Illuminate\Database\Migrations\Migration;

class RunMigration extends Migration
{
    public function __construct(Capsule $capsule)
    {
        $userMigration = new UserMigration($capsule);
    }
}
