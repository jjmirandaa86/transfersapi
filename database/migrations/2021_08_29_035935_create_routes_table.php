<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id('idRoute');
            $table->string('idOffice', 4)->nullable(false);
            $table->string('name', 30)->nullable(false);
            $table->string('type', 1)
                ->nullable(false)
                ->default('E');
            $table->string('state', 1)->default('A');
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
        Schema::dropIfExists('routes');
    }
}
