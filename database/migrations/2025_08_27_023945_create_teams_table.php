<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Perbaikan: project_id diperlukan untuk menghubungkan team dengan project
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->timestamps();
            
            // Perbaikan: Tambah unique constraint untuk mencegah duplikasi
            // Satu user tidak bisa berada di team yang sama untuk project yang sama
            $table->unique(['user_id', 'project_id'], 'unique_user_project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};