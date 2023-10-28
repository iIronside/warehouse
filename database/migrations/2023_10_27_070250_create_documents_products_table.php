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
        Schema::create('documents_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_article');
            $table->integer('quantity');
            $table->integer('remnants');
            $table->bigInteger('documents_id')->unsigned();
            $table->foreign('documents_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_product');
    }
};
