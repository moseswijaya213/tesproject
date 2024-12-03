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
        Schema::create('p_project_entry', function (Blueprint $table) {
            $table->id('id_entry');
            $table->string('project_code');
            $table->string('nama_kantong');
            $table->string('nama_item');
            $table->integer('quantity');
            $table->string('status')->nullable();
            $table->string('bukti_foto')->nullable();
            $table->timestamps();

            $table->foreign('project_code')->references('project_code')->on('p_project')->onDelete('cascade');
            $table->foreign(['project_code', 'nama_kantong'])->references(['project_code', 'nama_kantong'])->on('p_project_kantong')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_project_entry');
    }
};
