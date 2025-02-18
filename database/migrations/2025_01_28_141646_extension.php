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
        Schema::create('tbl_extensionSolicitud', function (Blueprint $table) {
            $table->id('idExtensionSolicitud');
            $table->string( 'folio',  12);
            $table->foreignId('idExtensionCatalogo')->references('idExtensionCatalogo')->on('tbl_catalogoExtensiones');
            $table->foreignId('idArea')->references('idArea')->on('tbl_catalogoAreas');
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
        Schema::dropIfExists('tbl_extensionSolicitud');

    }
};
