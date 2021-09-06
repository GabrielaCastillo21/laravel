<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\Empleado;
use App\Models\Cliente;
class Home extends Controller
{
    public function index(){
        $puestos = Puesto::all();
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        return view("Home.index",["puestos"=>$puestos,"empleados"=>$empleados, "clientes"=>$clientes]);
    }

    public function create(Request $req){
        $empleado = new Empleado();

        $empleado->codigo=$req->input('txt_codigo');;
        $empleado->nombres=$req->input('txt_nombres');
        $empleado->apellidos=$req->input('txt_apellidos');
        $empleado->direccion=$req->input('txt_direccion');
        $empleado->telefono=$req->input('txt_telefono');
        $empleado->fecha_nacimiento=$req->input('txt_fn');
        $empleado->id_puesto=$req->input('drop_puesto');

        $empleado->save();

        return redirect()->action([Home::class, 'index']);

    }

    public function update(Request $req){
        $empleado = Empleado::find($req->input('txt_id'));

        $empleado->codigo=$req->input('txt_codigo');
        $empleado->nombres=$req->input('txt_nombres');
        $empleado->apellidos=$req->input('txt_apellidos');
        $empleado->direccion=$req->input('txt_direccion');
        $empleado->telefono=$req->input('txt_telefono');
        $empleado->fecha_nacimiento=$req->input('txt_fn');
        $empleado->id_puesto=$req->input('drop_puesto');

        $empleado->update();
        
        return redirect()->action([Home::class, 'index']);
    }

    public function delete(Request $req){
        $empleado = Empleado::find($req->input('txt_id'));

        $empleado->delete();
 
        return redirect()->action([Home::class, 'index']);
    }
}
