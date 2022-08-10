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
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subj_code')->unique();
            $table->string('title');
            $table->string('category');

            $table->unsignedInteger('programs_id');
            $table->foreign('programs_id')
            ->references('id')->on('programs')
            ->onDelete('cascade');

            $table->decimal('units');
            $table->string('term');
            $table->boolean('is_enabled')->default(false);
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
        Schema::dropIfExists('subjects');
    }
};
