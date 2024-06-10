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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('img');
            $table->integer('views');
            $table->string('status');
            $table->date('publish_date');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
