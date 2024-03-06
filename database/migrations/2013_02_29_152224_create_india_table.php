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
        Schema::create('india', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('number_servers');
            $table->string('VDS_VPS');
            $table->string('price');
            $table->string('date_payment');
            $table->string('paid_by');
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
        Schema::dropIfExists('india');
    }
};
