<?php

use Illuminate\Database\Seeder;

class CatPerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cat_perfil")->insert([
            "idperfil"=>1,
            "descripcion"=>"administrador"
        ]);
        DB::table("cat_perfil")->insert([
            "idperfil"=>2,
            "descripcion"=>"editor"
        ]);
    }
}
