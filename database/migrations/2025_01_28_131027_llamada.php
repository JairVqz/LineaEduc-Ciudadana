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
        Schema::create('tbl_llamadaSolicitud', function (Blueprint $table) {
            $table->id('idLlamada');
            $table->string( 'folio',  12);
            $table->time('horaInicio');
            $table->time('horaTermino');
            $table->string('duracionMinutos', 5)->nullable();
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
        Schema::dropIfExists('tbl_llamadaSolicitud');
        
    }
};
