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
        Schema::create('metadata', function (Blueprint $table) {
            $table->id();
            $table->integer('like_count')->nullable(false)->default(0)->comment('被喜歡數量');
            $table->integer('view_count')->nullable(false)->default(0)->comment('被查看數量');
            $table->integer('comment_count')->nullable(false)->default(0)->comment('被評論數量');
            $table->integer('share_count')->nullable(false)->default(0)->comment('被分享數量');
            $table->integer('favorite_count')->nullable(false)->default(0)->comment('被收藏數量');
            $table->foreignId('post_id')->nullable(false)->constrained('posts')->onDelete('cascade')->comment('文章ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadata');
    }
};
