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

            // $table->string('category');
            // $table->string('vacantDescription');
            // $table->string('jobRequirement');
            // $table->string('vacantLocation');
            // $table->string('vacantExperience');
            // $table->string('applicatioLink');
            // $table->string('deadline');
            // $table->string('vacantDate');
            // $table->string('timeAgo');

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