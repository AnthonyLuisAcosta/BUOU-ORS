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
        Schema::create('selectedsub', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('selected_sub');
            $table->foreign('selected_sub')
            ->references('id')->on('subjects')
            ->onDelete('cascade');

            $table->unsignedInteger('applicant_id');
            $table->foreign('applicant_id')
            ->references('id')->on('applications')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selectedsub');
    }
};
