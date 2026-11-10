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
    Schema::create('matriculas', function (Blueprint $table) {
        $table->id();
        $table->date('fecha_matricula');
        $table->decimal('precio_total', 10, 2);
        $table->string('estado', 30)->default('pendiente');

        $table->foreignId('alumnos_id')->constrained('alumnos')->onDelete('cascade');
        $table->foreignId('grupos_id')->constrained('grupos')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('matriculas');
}
};
