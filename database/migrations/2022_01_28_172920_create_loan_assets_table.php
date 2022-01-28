<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->unsignedBigInteger('serial_id');
            $table->foreign('serial_id')->references('id')->on('serials');
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
        Schema::dropIfExists('loan_assets');
    }
}
