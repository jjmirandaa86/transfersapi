<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id('idRegion')
                ->comment('Codigo de la Region');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Codigo del Pais');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombre de la region');
            $table->string('state', 1)
                ->default('A')
                ->comment('Si la region esta Activo o Inactivo');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
