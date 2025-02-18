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
        Schema::create('tbl_seguimientoSolicitud', function (Blueprint $table) {
            $table->id('idSeguimiento');
            $table->string('folio', 12);
            $table->text('comentario');
            $table->string('nombre_usuario',250);
            $table->string('curp_usuario', 18);
            $table->foreignId('idArea')->references('idArea')->on('tbl_catalogoAreas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_seguimientoSolicitud');
    }
};
