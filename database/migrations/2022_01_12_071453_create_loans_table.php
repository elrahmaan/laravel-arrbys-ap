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
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('approved_by');
            $table->text('phone')->nullable();
            $table->enum('category_asset', ['AP','Sewa']);
            $table->string('purpose')->nullable();
            $table->date('loan_date');
            $table->date('estimation_return_date');
            $table->date('real_return_date');
            $table->string('reason');
            $table->enum('status',['Pinjam','Kembali','Terlambat']);   
            $table->string('equipment');
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