<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = Carbon::now("America/Mexico_City")->toDateTimeString();
        DB::table("usuario")->insert([
            "usuario"=>"usuario1",
            "password"=>bcrypt("password"),
            "nombre"=>"Usuario 1",
            "created_at"=>$current_date,
            "idperfil_fk"=>1
        ]);
        DB::table("usuario")->insert([
            "usuario"=>"usuario2",
            "password"=>bcrypt("password"),
            "nombre"=>"Usuario 2",
            "created_at"=>$current_date,
            "idperfil_fk"=>2
        ]);

        DB::table("usuario")->insert([
            "usuario"=>"usuario3",
            "password"=>bcrypt("password"),
            "nombre"=>"User 3",
            "created_at"=>$current_date,
            "idperfil_fk"=>2
        ]);
    }
}
