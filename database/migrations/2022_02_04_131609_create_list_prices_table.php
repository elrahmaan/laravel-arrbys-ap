<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('asset_categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('year')->nullable();
            $table->string('rent_status')->nullable();
            $table->integer('qty')->nullable();
            $table->double('usage_condition')->nullable();
            $table->double('unit_price')->nullable();
            $table->integer('total_price_condition')->nullable();
            $table->double('usage_realization')->nullable();
            $table->integer('total_price_realization')->nullable();
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
        Schema::dropIfExists('list_prices');
    }
}
