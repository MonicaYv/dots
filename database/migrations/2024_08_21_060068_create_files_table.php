<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('extension', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('filetype')->nullable();
            $table->text('parentpath')->nullable();
            $table->text('path')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('openwith')->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_root')->default(0);
            $table->tinyInteger('is_share')->default(0);
            $table->tinyInteger('status');
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};