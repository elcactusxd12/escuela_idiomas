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
    Schema::create('pagos', function (Blueprint $table) {
        $table->id();
        $table->decimal('monto', 10, 2);
        $table->date('fecha_pago');
        $table->string('metodo_pago', 50);
        $table->string('concepto', 100);

        $table->foreignId('matriculas_id')->constrained('matriculas')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('pagos');
}
};
