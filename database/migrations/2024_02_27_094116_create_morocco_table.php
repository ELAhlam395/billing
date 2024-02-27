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
        Schema::create('morocco', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('DVS_VPS');
            $table->integer('Added_ips');
            $table->integer('price');
            $table->string('status');
            $table->string('Due_Date');
            $table->string('remarks');
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
        Schema::dropIfExists('morocco');
    }
};
