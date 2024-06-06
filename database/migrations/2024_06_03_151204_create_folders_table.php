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
        Schema::create('folders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('folder')->unsigned()->nullable()->default(null);
            $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('path')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('status');
            $table->bigInteger('created_by')->unsigned()->nullable()->default(null);
            $table->timestamps();

            // Add foreign key constraint to parent folder
            $table->foreign('folder')->references('id')->on('folders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
