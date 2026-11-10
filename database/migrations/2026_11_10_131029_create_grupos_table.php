<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('grupos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->string('horario', 100);
        $table->integer('cupo_maximo');

        $table->foreignId('cursos_id')->constrained('cursos')->onDelete('cascade');
        $table->foreignId('profesores_id')->constrained('profesores')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('grupos');
}

};
