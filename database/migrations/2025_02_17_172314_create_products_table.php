<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->longText('long_description')->nullable();
            $table->decimal('regular_price', 8, 2); // Assuming 8 digits with 2 decimal places
            $table->decimal('sale_price', 8, 2); // Assuming 8 digits with 2 decimal places
            $table->string('image');
            $table->longText('images')->nullable();
            $table->unsignedBigInteger('category_id'); // Assuming category_id is an unsigned integer
            $table->timestamps();

            // Adding a foreign key constraint assuming there's a categories table
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
