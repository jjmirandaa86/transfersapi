<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('idCountry', 2)
                ->primary()
                ->comment('Codigo del Pais');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombre del Pais');
            $table->string('currency', 3)
                ->nullable(false)
                ->comment('Moneda del Pais');
            $table->string('simbol', 1)
                ->nullable(false)
                ->comment('Simbolo de la moneda del Pais');
            $table->string('state', 1)
                ->default('A')
                ->comment('Si el pais esta Activo o Inactivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
