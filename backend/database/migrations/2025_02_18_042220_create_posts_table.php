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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 15);
            $table->string('slug', 15);
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('accountid')->constrained('accounts');
            $table->foreignId('categoriesid')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
