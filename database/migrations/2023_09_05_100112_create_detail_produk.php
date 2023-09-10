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
        Schema::create('detail_produk', function (Blueprint $table) {
            $table->integer('id_produk', false, true);
            $table->foreign('id_produk', 'fk_id_produk')->references('id')->on('produk');
            $table->string('jaringan', 30);
            $table->string('os', 30);
            $table->string('cpu', 60);
            $table->string('gpu', 60);
            $table->integer('ram', false, true);
            $table->double('ukuran_layar', 3, 1, true);
            $table->string('tipe_layar', 60);
            $table->string('resolusi_layar', 30);
            $table->string('kamera_belakang', 120);
            $table->string('kamera_depan', 120);
            $table->string('sim', 60);
            $table->string('baterai', 60);
            $table->string('dimensi', 30);
            $table->integer('berat', false, true);
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produk');
    }
};
