<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('register', function (Blueprint $table) {
        $table->string('role')->default('user'); // default role is 'user'
    });
}

public function down()
{
    Schema::table('register', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}

};
