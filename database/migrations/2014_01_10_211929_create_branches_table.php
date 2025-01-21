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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            $table->string('name',50)->unique(); 
            $table->string('country', 50);
            $table->string('city',50); 
            $table->string('address', 300);
            $table->string('code', 30)->nullable();
            $table->string('phones', 50);
            $table->tinyInteger('status')->default(0)->comment('0:disabled , 1: enable, 2:punished');

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
        Schema::dropIfExists('branches');
    }
};
