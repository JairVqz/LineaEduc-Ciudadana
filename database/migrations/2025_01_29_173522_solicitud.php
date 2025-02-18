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
        Schema::create('tbl_solicitudesGeneral', function (Blueprint $table) {
            $table->id();
            $table->string('folio',12)->unique();
            $table->string('nombre', 50);
            $table->string('apellidoPaterno', 50);
            $table->string('apellidoMaterno', 50)->nullable();
            $table->foreignId('idTipoSolicitud')->references('idTipoSolicitud')->on('tbl_tipoSolicitud')->onDelete('cascade');
            $table->foreignId('idPrioridad')->references('idPrioridad')->on('tbl_prioridad');
            $table->foreignId('idEstatus')->references('idEstatus')->on('tbl_estatus')->onDelete('cascade');
            $table->text('descripcion');
            $table->string('diasTranscurridos', 5);
            $table->timestamps();
            $table->string('curp_usuario', 18);
            $table->text('nombre_usuario');
            //SEPARACIÓN DE DATOS EN TABLAS:
            $table->foreignId('idExtensionSolicitud')->references('idExtensionSolicitud')->on('tbl_extensionSolicitud')->onDelete('cascade'); //extension e info del area que atendera la solicitud
            $table->foreignId('idUbicacion')->references('idUbicacion')->on('tbl_ubicacionSolicitud')->onDelete('cascade');//ubicacion de la solciitud
            $table->foreignId('idContacto')->references('idContacto')->on('tbl_contactoSolicitud')->onDelete('cascade');//datos de contacto
            $table->foreignId('idLlamada')->references('idLlamada')->on('tbl_llamadaSolicitud')->onDelete('cascade');//datos de la llamada

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
        Schema::dropIfExists('tbl_solicitudesGeneral');
    }
};
