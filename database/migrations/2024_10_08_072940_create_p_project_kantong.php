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
        Schema::create('p_project_kantong', function (Blueprint $table) {
            $table->id('id_kantong');
            $table->string('project_code');
            $table->string('nama_kantong')->nullable();
            $table->timestamps();

            $table->foreign('project_code')->references('project_code')->on('p_project')->onDelete('cascade');

            $table->unique(['project_code', 'nama_kantong']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_project_kantong');
    }
};

