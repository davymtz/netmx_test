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
            "usuario"=>"david",
            "password"=>bcrypt("password"),
            "nombre"=>"David",
            "created_at"=>$current_date,
            "idperfil_fk"=>1
        ]);
        DB::table("usuario")->insert([
            "usuario"=>"angelica",
            "password"=>bcrypt("password"),
            "nombre"=>"Angelica",
            "created_at"=>$current_date,
            "idperfil_fk"=>2
        ]);
    }
}
