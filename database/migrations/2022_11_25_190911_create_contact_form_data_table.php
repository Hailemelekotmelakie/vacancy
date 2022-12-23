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
        Schema::create('contact_form_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->String('email');
            $table->String('phoneNo');
            $table->String('message');
            $table->String('timeAgo');
            $table->String('date');
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
        Schema::dropIfExists('contact_form_data');
    }
};