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

            $table->string('code',15)->unique();
            $table->string('name',50)->unique(); 
            $table->string('tradename',50)->unique(); 
            $table->string('description', 400)->nullable();
            $table->string('brand', 100)->nullable();
            /* valores enteros solo positivos */
            $table->unsignedInteger('quantity_min')->default(0)->nullable();
            $table->unsignedInteger('quantity_max')->default(0)->nullable();
            $table->string('barcode',50)->default(0)->nullable();
            /* $table->unsignedBigInteger('category_id')->nullable(); */
            $table->foreignId('category_id')                  
                  ->constrained('categories')
                  ->cascadeOnUpdate();
                  
                  
            $table->tinyInteger('status')->default(0)->comment('0:disabled , 1: enable');

            $table->timestamps();

            /* $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onUpdate('cascade')
                  ->onDelete('set null'); */
            
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

