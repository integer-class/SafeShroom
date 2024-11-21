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
            $table->text('description')->nullable(); // Deskripsi jamur (opsional)
            $table->string('photo')->nullable(); // Foto jamur (opsional)
            $table->boolean('is_poisonous')->default(false); // Status apakah jamur beracun
            $table->boolean('is_edible')->default(true); // Status apakah jamur dapat dimakan
            $table->timestamps(); // Kolom created_at dan updated_at
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
