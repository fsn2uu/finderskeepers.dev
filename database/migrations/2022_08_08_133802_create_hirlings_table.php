<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirlings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('race');
            $table->string('subrace')->nullable();
            $table->text('description')->nullable();
            $table->string('job');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hirlings');
    }
};
