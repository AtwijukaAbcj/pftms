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
            $table->uuid('id')->primary();
            $table->string('emp_id')->nullable();
            $table->uuid('division')->nullable();
            $table->uuid('province')->nullable();
            $table->uuid('region')->nullable();
            $table->text('roles')->nullable();
            $table->string('firstname', 150)->nullable();
            $table->string('middlename', 150)->nullable();
            $table->string('lastname', 150)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('position', 150)->nullable();
            $table->enum('emp_type', ['contractual', 'permanent', 'temporary'])->nullable();
            $table->string('username', 191)->unique();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->text('address')->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->enum('is_active', ['y', 'n'])->default('y');
            $table->timestamps();
            $table->softDeletes();
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
