<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('id')->on('service_assets');
            $table->string('complainant_name')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->text('desc_complain')->nullable();
            $table->text('diagnose')->nullable();
            $table->date('date_fixed')->nullable();
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
        Schema::dropIfExists('unit_logs');
    }
}
