<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('subject');
        $table->text('description');
        $table->unsignedBigInteger('user_id'); // links to the user who created it
        $table->timestamps(); // optional but useful
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
