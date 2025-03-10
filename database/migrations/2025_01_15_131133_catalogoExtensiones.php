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
        Schema::create('tbl_catalogoExtensiones', function (Blueprint $table) {
            $table->id('idExtensionCatalogo');
            $table->string('extension', 10);
            $table->string('nombreTitular', 255);
            $table->foreignId('idArea')->references('idArea')->on('tbl_catalogoAreas');
            $table->foreignId('idPuesto')->references('idPuesto')->on('tbl_catalogoPuestos');

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
        Schema::dropIfExists('tbl_catalogoExtensiones');

    }
};
