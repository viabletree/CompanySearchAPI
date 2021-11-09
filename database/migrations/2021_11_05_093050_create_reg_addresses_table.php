<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyNumber');
            $table->string('CareOf');
            $table->string('POBox');
            $table->string('AddressLine1');
            $table->string('AddressLine2');
            $table->string('PostTown');
            $table->string('County');
            $table->string('PostCode');
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
        Schema::dropIfExists('reg_address');
    }
}