<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSicCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sic_codes', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyNumber');
            $table->string('SicText_1');
            $table->string('SicText_2');
            $table->string('SicText_3');
            $table->string('SicText_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sic_codes');
    }
}