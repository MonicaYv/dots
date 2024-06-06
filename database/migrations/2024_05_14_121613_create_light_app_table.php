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
        Schema::create('light_app', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('website_link')->nullable();
            $table->enum('app_group', ['Tool', 'Game', 'Movie', 'Music', 'Life', 'Others'])->nullable();
            $table->string('app_description')->nullable();
            $table->string('picture_icon')->nullable();
            $table->enum('open_type', ['new_window', 'dialog'])->default('new_window');
            $table->string('dialog_width')->nullable();
            $table->string('dialog_height')->nullable();
            $table->integer('allow_width_adjustment')->default(1);
            $table->integer('minimilist_title_bar')->default(0);
            
            $table->timestamps();
        });

         // DB::table('light_app')
         //    ->insert(array(
         //        array('app_group' => 'Tool'),
         //        array('app_group' => 'Game'),
         //        array('app_group' => 'Movie'),
         //        array('app_group' => 'Music'),
         //        array('app_group' => 'Life'),
         //        array('app_group' => 'Others')
         //    ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('light_app');
    }
};
