<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('username')->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->string('name')->nullable(false);
            $table->integer('employee_id')->unique();
            $table->string('email');
            $table->integer('division_id');
            $table->integer('section_id');
            $table->integer('position_id');
            $table->integer('role_id');
            $table->boolean('is_active')->nullable(false)->default(false);
            $table->string('token', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
