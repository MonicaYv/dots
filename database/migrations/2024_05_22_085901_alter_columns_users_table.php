<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->string('ip_address');
            $table->integer('roleID')->nullable()->change();
            $table->string('phone', length: 20)->nullable()->change();
            $table->string('nickName', length: 50)->nullable()->change();
            $table->string('avatar', length: 255)->nullable()->change();
            $table->integer('status')->nullable()->change();
            $table->integer('lastLogin')->nullable()->change();
            $table->string('sex', length: 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};
