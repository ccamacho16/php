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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->time('check_in');
            $table->time('check_out')->nullable();
            $table->integer('locker');
            $table->string('name', 100);
            $table->string('description', 400)->nullable();

            $table->foreignId('user_id')                  
            ->constrained('users')
            ->cascadeOnUpdate();            
            /*
            cuando se le asigna un casillero ya se tiene que guardar
            el registro y posteriormete actualizarlo.
            */
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
        Schema::dropIfExists('histories');
    }
};
