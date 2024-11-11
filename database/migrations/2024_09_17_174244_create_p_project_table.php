<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::create('p_project', function (Blueprint $table) {
        $table->id('id_project');
        $table->string('project_name')->nullable();
        $table->string('project_code')->unique();
        $table->string('perusahaan')->nullable();
        $table->string('pic')->nullable();
        $table->string('bidang_usaha')->nullable();
        $table->text('alamat')->nullable();
        $table->date('target_live_project')->nullable();
        $table->string('sistem_operasional')->nullable();
        $table->string('cashflow')->nullable();
        $table->string('jenis_kerjasama')->nullable();
        $table->string('status_asset')->nullable();
        $table->string('project_category')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_project');
    }
};

