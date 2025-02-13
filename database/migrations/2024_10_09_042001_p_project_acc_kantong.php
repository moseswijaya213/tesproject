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
        Schema::create('p_project_acc_kantong', function (Blueprint $table) {
            $table->id('id_access');
            $table->string('project_code');
            $table->string('nama_kantong')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->integer('entry_access')->nullable();
            $table->integer('exit_access')->nullable();
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
        Schema::dropIfExists('p_project_acc_kantong');
    }
};

