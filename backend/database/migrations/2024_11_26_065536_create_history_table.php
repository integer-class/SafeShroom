<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id('id_history'); // Auto-increment primary key dengan nama id_history
            $table->unsignedBigInteger('id_user'); // Foreign key ke tabel users
            $table->unsignedBigInteger('id_mushroom'); // Foreign key ke tabel mushrooms
            $table->unsignedBigInteger('id_recommendation'); // Foreign key ke tabel recommendations (misal tabel ini ada)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Tambahkan foreign key untuk id_user
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Hapus otomatis jika user terkait dihapus

            // Tambahkan foreign key untuk id_mushroom
            $table->foreign('id_mushroom')
                  ->references('id')
                  ->on('mushrooms')
                  ->onDelete('cascade'); // Hapus otomatis jika mushroom terkait dihapus

            // Tambahkan foreign key untuk id_recommendation
            $table->foreign('id_recommendation')
                  ->references('id')
                  ->on('recommendations') // Pastikan tabel recommendations ada
                  ->onDelete('cascade'); // Hapus otomatis jika recommendation terkait dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('history'); // Drop tabel jika rollback dilakukan
    }
}
