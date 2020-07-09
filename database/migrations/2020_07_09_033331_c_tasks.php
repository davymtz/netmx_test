<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->smallIncrements('idtask')->nullable(false);
            $table->string('title',25)->nullable(false);
            $table->string('descripcion',70)->nullable(true);
            $table->enum('status',['abierta','proceso','cerrada'])->nullable(false)->default('abierta');
            $table->timestamps();
            $table->unsignedSmallInteger('idusuario_fk');
            $table->foreign('idusuario_fk')->references('idusuario')->on('usuario')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table){
            $table->dropForeign(['idusuario_fk']);
        });
        Schema::dropIfExists('task');
    }
}
