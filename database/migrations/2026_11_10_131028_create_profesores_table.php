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
    Schema::create('profesores', function (Blueprint $table) {
        $table->id();
        $table->string('dni', 8)->unique();
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->string('email', 150)->unique();
        $table->string('telefono', 20)->nullable();
        $table->string('especialidad', 100);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('profesores');
}
};
