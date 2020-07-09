<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'nombre','estatus', 'fecha'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','created_at','updated_at'
    ];

    public function setSession($user) {
        Session::put([
            "idusuario"=>$user["idusuario"],
            "usuario"=>$user["usuario"],
            "name"=>$user["nombre"],
            "idperfil_fk"=>$user["idperfil_fk"],
            "ifconnect"=>true
        ]);
    }
}
