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
        Schema::create('tbl_ubicacionSolicitud', function (Blueprint $table) {
            $table->id('idUbicacion');
            $table->string( 'folio',  12);
            $table->string('cct',11)->nullable();//hice nullables los campos del cct
            $table->string('nivelCct', 50)->nullable(); 
            $table->text('nombrePlantel')->nullable(); //agregué el nombre del plantel
            $table->string('nombreDirector', 150)->nullable();
            $table->string('municipio', 50)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->text('direccionCct')->nullable();
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
        Schema::dropIfExists('tbl_ubicacionSolicitud');
    }
};
