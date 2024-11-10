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
        Schema::create('mushrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama jamur
            $table->text('description'); // Deskripsi jamur
            $table->string('photo'); // photo jamur
            $table->boolean('is_poisonous'); // Status apakah jamur beracun atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mushrooms');
    }
};
