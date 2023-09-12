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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'employee', 'client'])->default('client');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('address')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('state')->nullable()->default('Niger');
            $table->string('country')->nullable()->default('Nigeria');
            $table->enum('religion', ['christian', 'muslim', 'traditional', 'none'])->default('none');
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->default('single');
            $table->integer('no_of_children')->nullable()->default(0);
            $table->integer('reports_to')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
};
