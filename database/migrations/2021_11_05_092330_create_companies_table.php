<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName');
            $table->string('CompanyNumber');
            $table->string('CompanyCategory');
            $table->string('CompanyStatus');
            $table->string('CountryOfOrigin');
            $table->string('DissolutionDate');
            $table->string('IncorporationDate');
            $table->string('URI');
            $table->string('ConfStmtNextDueDate');
            $table->string('ConfStmtLastMadeUpDate');
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
        Schema::dropIfExists('company');
    }
}