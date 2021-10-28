<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->string('idOffice', 4)
                ->primary()
                ->comment('Codigo de la Oficina');
            $table->string('idCenter', 4)
                ->nullable(false)
                ->comment('Codigo del centro');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombr de la Oficina');
            $table->string('state', 1)
                ->default('A')
                ->comment('Si la oficina esta Activo o Inactivo');
            $table->timestamps();

            $table->foreign('idCenter')->references('idCenter')->on('centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
