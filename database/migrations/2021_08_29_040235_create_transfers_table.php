<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id('idTransfer')
                ->comment('Codigo unico de la transferencia');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Codigo del Pais');
            $table->unsignedBigInteger('idUser')
                ->nullable(false)
                ->comment('Codigo del usuario');
            $table->unsignedBigInteger('idBank')
                ->nullable(false)
                ->comment('Codigo del Banco');
            $table->string('idCustomer', 13)
                ->nullable(false)
                ->comment('Codigo / Ruc / Cedula del cliente');
            $table->string('nameCustomer', 50)
                ->nullable(false)
                ->comment('Nombre del cliente y/o tienda');
            $table->string('voucher', 20)
                ->nullable(false)
                ->comment('Numero de documento deposito');
            $table->double('amount', 8, 2)
                ->nullable(false)
                ->comment('Monto del deposito');
            $table->string('image', 100)
                ->nullable(false)
                ->comment('Ruta de Imagen Servidor');
            $table->string('state', 1)
                ->default('I')
                ->comment('I Ingresada, A Aprobada, R Rechazado');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries');
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idBank')->references('idBank')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
