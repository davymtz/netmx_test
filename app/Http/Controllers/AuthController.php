<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLoginForm() {
        return view("login");
    }

    public function login(Request $request) {
        $validacion = $this->validateLogin($request);
        if(!$validacion->fails())
        {
            // Intento de registro en la aplicación
            if(Auth::guard("web")->attempt(["usuario"=>$request->input("user"),"password"=>$request->input("password")])) {
                Auth::user()->setSession(Auth::user()->toArray());
                return redirect()->intended("panel");
            }
            return redirect()->route('login')->with("messages",["Las credenciales no coinciden"]);
        }else{
            $request->session()->flash("messages",$validacion->errors()->all());
            return redirect()->route('login')->send();
        }
    }

    public function logout() {
        Auth::guard("web")->logout();
        session()->flush();
        return redirect("/");
    }

    public function validateLogin($request) {
        $rules = [
            "user"=>"required|string",
            "password"=>"required|string",
        ];
        $messages = [
            "user.required"=>"El campo de Usuario es requerido",
            "password.required"=>"El campo de Password es requerido",
            "user.string"=>"El campo de Usuario debe ser alfanúmerico",
            "password.string"=>"El campo de Password debe ser alfanúmerico",
        ];
        $error = Validator::make($request->all(),$rules,$messages);
        return  $error;
    }
}
