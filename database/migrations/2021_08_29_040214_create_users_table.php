<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUser')
                ->comment('Codigo de Empleado y/o Identificacion');
            $table->string('idOffice', 4)
                ->nullable(false)
                ->comment('Codigo de oficina');
            $table->string('firtsName', 50)
                ->nullable(false)
                ->comment('Nombre de la persona');
            $table->string('lastName', 50)
                ->nullable(false)
                ->comment('Apellido de la persona');
            $table->string('position', 50)
                ->nullable(false)
                ->comment('Carga en la compañia');
            $table->string('profile', 3)
                ->nullable(false)
                ->default('USR')
                ->comment('USR Usuario Final ADM Administrador APR Aprobador VIS Visualiza');
            $table->string('email', 40)
                ->nullable(false)
                ->unique()
                ->comment('Correo electronico para que lleguen las notificaiones');
            $table->string('password')
                ->nullable()
                ->comment('Contraseña encriptada');
            $table->string('api_token')
                ->nullable(true)
                ->comment('Token de conexion');
            $table->string('state', 1)
                ->default('A')
                ->comment('Si el usuario esta Activo o Inactivo');
            $table->timestamps();

            $table->foreign('idOffice')->references('idOffice')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
