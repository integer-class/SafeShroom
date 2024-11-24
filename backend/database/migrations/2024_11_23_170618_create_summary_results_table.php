<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryResultsTable extends Migration
{
    public function up()
    {
        Schema::create('summary_results', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('mushroom_id'); // Foreign key ke tabel mushrooms
            $table->text('summary'); // Kolom untuk menyimpan ringkasan hasil
            $table->string('photo')->nullable(); // Kolom foto bersifat opsional
            $table->timestamps(); // Kolom created_at dan updated_at

            // Tambahkan foreign key ke tabel mushrooms
            $table->foreign('mushroom_id')
                  ->references('id')
                  ->on('mushrooms')
                  ->onDelete('cascade'); // Hapus otomatis jika mushroom terkait dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('summary_results'); // Drop tabel jika rollback dilakukan
    }
}
