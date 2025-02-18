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
        Schema::create('tbl_tipoSolicitud', function (Blueprint $table) {
            $table->id('idTipoSolicitud');
            $table->string('tipoSolicitud', 100);
            $table->foreignId('idArea')->references('idArea')->on('tbl_catalogoAreas')->onDelete('cascade');
            $table->foreignId('idPrioridad')->references('idPrioridad')->on('tbl_prioridad')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_tipoSolicitud');
    }
};
