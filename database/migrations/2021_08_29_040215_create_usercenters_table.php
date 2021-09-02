<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercenters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser')
                ->nullable(false)
                ->comment('Codigo del usuario');
            $table->string('idCentre', 4)
                ->nullable(false)
                ->comment('Codigo del centro');
            $table->string('state', 1)
                ->nullable(false)
                ->default("A")
                ->comment('Codigo del centro');
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idCentre')->references('idCentre')->on('centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usercenters');
    }
}
