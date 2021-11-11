<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitedPartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limited_partnerships', function (Blueprint $table) {
            $table->id();
            $table->integer('CompanyID');
            $table->string('CompanyNumber');
            $table->string('NumGenPartners');
            $table->string('NumLimPartners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limited_partnerships');
    }
}