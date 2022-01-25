<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            // $table->unsignedBigInteger('serial_id')->nullable();
            $table->foreignId('serial_id')->nullable();
            $table->string('approved_by');
            $table->text('phone')->nullable();
            $table->string('purpose')->nullable();
            $table->string('detail_loan')->nullable();
            $table->date('loan_date');
            $table->date('estimation_return_date');
            $table->date('real_return_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('status');
            // $table->string('equipment');
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
        Schema::dropIfExists('loans');
    }
}
