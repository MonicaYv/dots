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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('extension', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('path')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->bigInteger('folder')->unsigned()->nullable()->default(null);
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('status');
            $table->bigInteger('created_by')->unsigned()->nullable()->default(null);
            $table->timestamps();

            // Add foreign key constraint to folder
            $table->foreign('folder')->references('id')->on('folders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
