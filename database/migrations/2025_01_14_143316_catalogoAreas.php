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
        Schema::create('tbl_catalogoAreas', function (Blueprint $table) {
            $table->id('idArea');
            $table->string('area', 100);
            //$table->foreignId('idExtensionCatalogo')->references('idExtensionCatalogo')->on('tbl_catalogoExtensiones');
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
        Schema::dropIfExists('tbl_catalogoAreas');
    }
};
