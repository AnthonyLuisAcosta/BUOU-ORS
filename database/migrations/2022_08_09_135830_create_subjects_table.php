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
            $table->string('subj_code');
            $table->string('title');
            $table->unsignedInteger('cat_id');

            $table->unsignedInteger('programs_id');
            $table->foreign('programs_id')
            ->references('id')->on('programs')
            ->onDelete('cascade');
            
            $table->string('prof');
            $table->decimal('units', 3, 1);
            $table->String('term');
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
