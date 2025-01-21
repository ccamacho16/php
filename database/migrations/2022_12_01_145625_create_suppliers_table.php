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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('tin',15)->unique();
            $table->string('name',50); 
            $table->string('address', 300);
            $table->string('city',50); 
            $table->string('phones', 50);
            $table->string('email', 100)->nullable();
            $table->string('account', 300)->nullable();
            $table->string('contact',300);             
            $table->string('field1', 100)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:disabled , 1: enable, 2:punished');

            /* propiedad cuando no se quiere que se borren los datos, solo se deshabiliten 
            $table->softDeletes();  */
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
