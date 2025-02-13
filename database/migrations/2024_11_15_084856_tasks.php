<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('id_task');
            $table->string('project_code');
            $table->string('nama_kantong')->nullable();
            $table->string('nama_access')->nullable();
            $table->string('nama_gate')->nullable();
            $table->string('task')->nullable();
            $table->string('bukti_pekerjaan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('project_code')->references('project_code')->on('p_project')->onDelete('cascade');
            $table->foreign(['project_code', 'nama_kantong'])->references(['project_code','nama_kantong',])->on('p_project_kantong')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
