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
        Schema::create('contact', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->string('nama', 30);
            $table->string('email', 60);
            $table->string('subyek', 255);
            $table->text('pesan');
            $table->enum('status', ['not-replied', 'replied'])->default('not-replied');
            $table->integer('replied_by', false, true)->nullable();
            $table->foreign('replied_by', 'fk_replied_by')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
