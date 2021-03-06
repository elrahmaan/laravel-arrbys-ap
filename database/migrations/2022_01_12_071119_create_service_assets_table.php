<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('asset_categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->text('image')->nullable();
            $table->integer('qty')->nullable();
            $table->string('complainant_name')->nullable();
            $table->string('category_asset')->nullable();
            $table->string('status')->nullable();
            $table->text('desc_complain')->nullable();
            $table->text('diagnose')->nullable();
            $table->date('date')->nullable();
            $table->date('date_fixed')->nullable();
            $table->string('detail_of_specification')->nullable();
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
        Schema::dropIfExists('service_assets');
    }
}
