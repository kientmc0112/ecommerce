<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('sex')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('info')->nullable();
            $table->integer('role')->default(1)->comment('1: client, 2: mod, 3: admin');
            $table->rememberToken();
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
}
