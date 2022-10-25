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
        Schema::create('fees_template', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->float('units');
            $table->float('admission');
            $table->float('tuition');
            $table->float('matricula');
            $table->float('medical');
            $table->float('library');
            $table->float('athletic');
            $table->float('cultural');
            $table->float('guidance');
            $table->float('scuaa');
            $table->float('distLearn');
            $table->float('total');
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
        Schema::dropIfExists('fees_template');
    }
};
