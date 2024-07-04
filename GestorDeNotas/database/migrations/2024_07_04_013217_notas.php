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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_materia_id');
            $table->decimal('nota', 3, 2);
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('estudiante_materia_id')->references('id')->on('estudiante_materias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign(['estudiante_materia_id']);
        });
        Schema::dropIfExists('notas');
    }
};
