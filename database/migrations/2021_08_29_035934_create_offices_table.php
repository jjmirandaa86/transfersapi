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
            $table->unsignedBigInteger('idRegion')
                ->nullable(false)
                ->comment('Codigo de la Region');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombr de la Oficina');
            $table->string('state', 1)
                ->default('A')
                ->comment('Si la oficina esta Activo o Inactivo');
            $table->timestamps();

            $table->foreign('idRegion')->references('idRegion')->on('regions');
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
