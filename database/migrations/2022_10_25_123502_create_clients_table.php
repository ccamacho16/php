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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('dni',15)->unique();
            //$table->string('city',3); 
            $table->string('sex',30); 
            $table->date('birth_date'); 
            $table->string('name',50); 
            $table->string('last_name',80); 
            $table->string('home_address', 300)->nullable();
            $table->string('business_address', 300)->nullable();            
            $table->string('phones', 50);
            $table->string('email', 100)->nullable();
            //$table->string('type', 30);
            $table->string('job', 150);
            //$table->unsignedBigInteger('job');

            $table->tinyInteger('status')->default(0)->comment('0:disabled , 1: enable, 2:punished');

            //$table->foreignId('job')->constrained('masters');

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
        Schema::dropIfExists('clients');
    }
};
