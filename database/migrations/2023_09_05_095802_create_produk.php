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
        Schema::create('produk', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->integer('id_kategori', false, true);
            $table->foreign('id_kategori', 'fk_id_kategori')->references('id')->on('kategori');
            $table->integer('id_brand', false, true);
            $table->foreign('id_brand', 'fk_id_brand')->references('id')->on('brand');
            $table->string('nama', 150);
            $table->double('harga');
            $table->string('gambar', 60)->nullable();
            $table->string('caption_gambar', 150)->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
