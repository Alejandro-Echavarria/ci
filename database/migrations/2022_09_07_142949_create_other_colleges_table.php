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
        Schema::create('others_colleges', function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('college_id');

            $table->foreign('college_id')
                  ->references('id')
                  ->on('colleges')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('other_colleges');
    }
};
