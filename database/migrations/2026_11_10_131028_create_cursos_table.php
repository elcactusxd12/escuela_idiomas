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
    Schema::create('cursos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('nivel', 50);
        $table->integer('duracion_horas');
        $table->decimal('precio', 10, 2);

        $table->foreignId('idiomas_id')->constrained('idiomas')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cursos');
}
};
