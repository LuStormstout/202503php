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
            $table->string('title')->nullable(false)->comment('標題');
            $table->text('content')->nullable(false)->comment('內容');
            $table->foreignId('author_id')->nullable(false)->constrained('authors')->onDelete('cascade')->comment('作者ID');
            $table->string('slug')->nullable(false)->unique()->comment('網址');
            $table->tinyInteger('status')->nullable(false)->default(1)->comment('狀態 0:草稿 1:發佈 2:隱藏');
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
