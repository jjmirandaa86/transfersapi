<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id('idBank')
                ->comment('Codigo del Banco');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Codigo de pais');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombre del Banco');
            $table->string('state', 1)
                ->default('A')
                ->comment('A Activo P Pasivo');
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
        Schema::dropIfExists('banks');
    }
}
