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
        Schema::create('vacantlisttables', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('vacantName');
            $table->string('vacantType');
            $table->string('vacantLogo')->nullable();
            $table->string('vacantImage')->nullable();

            $table->string('category');
            $table->longText('vacantDescription');
            $table->longText('jobRequirement')->nullable();
            $table->string('vacantLocation');
            $table->string('vacantExperience')->nullable();
            $table->string('applicatioLink')->nullable();
            $table->string('deadline')->nullable();
            $table->string('vacantDate')->nullable();
            $table->string('salary')->nullable();
            $table->string('status');
            $table->string('email');
            $table->string('timeAgo');
            $table->integer('noOfView');

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
        Schema::dropIfExists('vacantlisttables');
    }
};