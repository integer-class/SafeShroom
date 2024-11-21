<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('mushroom_id');
            $table->string('photo')->nullable(); // Menjadikan kolom photo nullable
            $table->foreign('mushroom_id')->references('id')->on('mushrooms')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
};
