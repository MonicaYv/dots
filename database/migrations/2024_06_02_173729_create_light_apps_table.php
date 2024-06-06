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
        Schema::create('light_apps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('description')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('open_type')->default(0);
            $table->integer('width')->default(700);
            $table->integer('height')->default(700);
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('add_app')->default(0);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('group')->references('id')->on('light_app_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('light_apps');
    }
};
