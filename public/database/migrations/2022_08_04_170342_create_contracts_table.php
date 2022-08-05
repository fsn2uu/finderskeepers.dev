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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contractor');
            $table->text('description');
            $table->integer('platinum')->default(0);
            $table->integer('electrum')->default(0);
            $table->integer('gold')->default(0);
            $table->integer('silver')->default(0);
            $table->integer('copper')->default(0);
            $table->text('loot')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
