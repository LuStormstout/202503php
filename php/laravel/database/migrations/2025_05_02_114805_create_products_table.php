<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->comment('名称');
            $table->decimal('price', 10, 2)->nullable(false)->comment('价格');
            $table->unsignedBigInteger('category_id')->nullable(false)->comment('分类ID');
            $table->unsignedTinyInteger('stock')->nullable(false)->default(0)->comment('库存');
            $table->unsignedTinyInteger('status')->nullable(false)->default(1)->comment('状态 1:上架 0:下架');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
