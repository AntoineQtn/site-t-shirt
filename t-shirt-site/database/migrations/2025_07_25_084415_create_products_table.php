<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('t-shirt');
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->string('t-shirt de marque')->nullable();
        $table->boolean('disponibilite')->default(true);
        $table->integer('quantite')->default(0);
        $table->decimal('price', 8, 2)->default(0.00); 
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
