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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('title');
            $table->text('slug');
            $table->string('sku');
            $table->text('description');
            $table->double('mrp',8,2);
            $table->double('price',8,2);
            $table->boolean('status')->default(true);
            $table->uuid('category_id');
            $table->text('tags')->nullable();
            $table->boolean('tax_applicable')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
