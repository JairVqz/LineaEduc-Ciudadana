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
        Schema::create('tbl_contactoSolicitud', function (Blueprint $table) {
            $table->id('idContacto');
            $table->string( 'folio',  12);
            $table->string('correo', 250)->nullable();
            $table->string('telefonoFijo', 15)->nullable();
            $table->string('telefonoCelular', 10)->nullable();
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
        Schema::dropIfExists('tbl_contactoSolicitud');
    }
};
