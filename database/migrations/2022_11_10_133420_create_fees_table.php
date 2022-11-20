<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('appRef_id');
            $table->unsignedInteger('fees');
            $table->unsignedInteger('addFees1');
            $table->unsignedInteger('addFees2');
            $table->unsignedInteger('addFees3');
            $table->unsignedInteger('addFees4');
            $table->unsignedInteger('addFees5');
            $table->unsignedInteger('addFees6');
            $table->unsignedInteger('addFees7');
            $table->unsignedInteger('addFees8');
            $table->unsignedInteger('addFees9');
            $table->unsignedInteger('addFees10');
            $table->float('addCost1');
            $table->float('addCost2');
            $table->float('addCost3');
            $table->float('addCost4');
            $table->float('addCost5');
            $table->float('addCost6');
            $table->float('addCost7');
            $table->float('addCost8');
            $table->float('addCost9');
            $table->float('addCost10');
            $table->float('total');
            $table->float('balance');
            $table->boolean('status');
            $table->string('receipt');
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
        Schema::dropIfExists('fees');
    }
};
