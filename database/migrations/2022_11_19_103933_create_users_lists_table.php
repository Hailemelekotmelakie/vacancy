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
        Schema::create('users_lists', function (Blueprint $table) {
            $table->id();
            $table->String('fullName');
            $table->String('email');
            $table->String('password');
            $table->String('role');
            $table->String('status');
            $table->String('code');
            $table->String('timeAgo');
            $table->String('registeredDate');
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
        Schema::dropIfExists('users_lists');
    }
};