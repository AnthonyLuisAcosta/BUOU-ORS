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
        Schema::enableForeignKeyConstraints();
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->date('birthDate');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('status')->default("Pending");
            $table->string('email');
            $table->string('phone');
            $table->string('company');
            $table->string('address');
            $table->string('adviser');
          
            $table->string('classification')->default("New Student");

            $table->unsignedInteger('applicant_id');

            $table->unsignedInteger('subject1')->nullable();
            $table->unsignedInteger('subject2')->nullable();
            $table->unsignedInteger('subject3')->nullable();

            $table->string('remarks')->nullable();

            $table->timestamps();


            $table->unsignedInteger('programs_id');
            $table->foreign('programs_id')
            ->references('id')->on('programs')
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
        Schema::dropIfExists('applications');
    }
};
