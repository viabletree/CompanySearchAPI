<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_names', function (Blueprint $table) {
            $table->id();
            $table->integer('CompanyID');
            $table->string('CompanyNumber');
            $table->string('key');
            $table->string('CONDATE');
            $table->string('CompanyName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_names');
    }
}