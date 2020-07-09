<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->smallIncrements('idusuario')->nullable(false);
            $table->string('usuario',25)->nullable(false);
            $table->string('password',70)->nullable(true);
            $table->string('nombre',30)->nullable(false);
            $table->timestamps();
            $table->unsignedTinyInteger('idperfil_fk')->default(2);
            $table->foreign('idperfil_fk')->references('idperfil')->on('cat_perfil')->onDelete('no action')->onUpdate('no action');
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
        Schema::table('usuario', function (Blueprint $table){
            $table->dropForeign(['idperfil_fk']);
        });
        Schema::dropIfExists('usuario');
    }
}
