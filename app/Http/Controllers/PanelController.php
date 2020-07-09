<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task as task;
use Carbon\Carbon;

class PanelController extends Controller
{
    public function index(Request $request) {
        $nombre = $request->get('buscarpor');
        $session = $this->getSession();
        $name = $session["nombre"];
        $tasks = DB::table("task")->join("usuario","task.idusuario_fk","=","usuario.idusuario")
            ->select("task.idtask","task.title","task.descripcion","task.created_at","usuario.idusuario","task.status")
            ->where("idusuario",$session["idusuario"])
            ->where("status","like","%$nombre%")->get();
        return view("panel_task.list", compact("name","tasks"));
    }

    public function show_detail($id) {
        $session = $this->getSession();
        $name = $session["nombre"];
        $task = DB::table("task")
            ->select("task.idtask","task.title","task.descripcion","task.created_at","task.status")
            ->where("idtask",$id)->get();
        return view("panel_task.show_detail", compact("name","task"));
    }

    public function create_task() {
        $session = $this->getSession();
        $name = $session["nombre"];
        return view("panel_task.create",compact("name"));
    }

    public function edit_task($id) {
        $session = $this->getSession();
        $name = $session["nombre"];
        $edit_task = $tasks = DB::table("task")
            ->select("task.idtask","task.title","task.descripcion","task.created_at","task.status")
            ->where("idtask",$id)->get();
        $options = ["abierta"=>"Abierta","proceso"=>"En proceso","cerrada"=>"Cerrada"];
        return view("panel_task.edit",compact("name","edit_task","options"));
    }

    public function create(Request $request) {
        $params = $request->all();
        $current_date = Carbon::now("America/Mexico_City")->toDateTimeString();
        $create = [
            "title"=>trim($params["title"]),
            "descripcion"=>trim($params["description"]),
            "status"=>trim($params["status"]),
            "idusuario_fk"=>$this->getSession()["idusuario"],
            "created_at"=>$current_date
        ];
        $insert = DB::table("task")->insert($create);
        if($insert)
            $request->session()->flash('success_messages', ['Registro creado satisfactoriamente']);

        return redirect()->route("panel");
    }

    public function edit(Request $request){
        $params = $request->all();
        $edit = [
            "title"=>trim($params["title"]),
            "descripcion"=>trim($params["description"]),
            "status"=>trim($params["status"])
        ];
        task::where("idtask",$params["idtask"])->update($edit);

        $request->session()->flash('success_messages', ['Registro editado satisfactoriamente']);
        return redirect()->route("panel");
    }

    public function delete(Request $request) {
        $params = $request->all();
        task::where("idtask",$params["idtask"])->delete();

        $request->session()->flash('success_messages', ['Registro eliminado satisfactoriamente']);
        return redirect()->route("panel");
    }

    public function getSession() {
        return request()->session()->all();
    }

    public static function isSelected($option,$selected)
    {
        return $option === $selected;
    }
}
