<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Empleado as ModelsEmpleado;
use Faker\Provider\ar_JO\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::with('cargo')->get();
       // dd($empleados);
        return view('empleado.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 0;
        $tipoAccion = 'Crear Nuevo Empleado';
        $modelEmpleado = new Empleado();
        $modelCargo = Cargo::select("nombre", "id_cargo")->get()->pluck("nombre", "id_cargo");
    
        return view('empleado.create', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $tipoAccion = 'Actualizar Empleado';
        $modelEmpleado = Empleado::find($id);
        $modelCargo = Cargo::select("nombre", "id_cargo")->get()->pluck("nombre", "id_cargo");

        return view('empleado.create', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUpdate()
    {
         //$datosEmpleado = request()->all();
         $datosEmpleado = request()->except('_token',"id");
        
         $id = request()->id;
         if($id)
         {
            Empleado::where("id_empleado", $id)->update($datosEmpleado);
         }else{
            Empleado::create($datosEmpleado);
         }
    
         return redirect("/empleados");
    }

    public function delete($id){
        $empleado = Empleado::find($id);
        $empleado->delete();
        return back();
    }

    public function reportes(){

        $salarioMin = "select e.nombre, e.apellido, c.nombre puesto, c.salario from empleado e
        inner join cargo c on e.id_cargo = c.id_cargo
        order by c.salario 
        limit 1";

        $salarioTodos = "select e.nombre, e.apellido, c.nombre puesto, c.salario from empleado e
        inner join cargo c on e.id_cargo = c.id_cargo";

        $salarioMax = "select e.nombre, e.apellido, c.nombre puesto, c.salario from empleado e
        inner join cargo c on e.id_cargo = c.id_cargo
        order by c.salario desc
        limit 1";

        $edades = "select e.nombre, e.apellido, c.nombre puesto, age(e.fecha_nac) edad from empleado e
        inner join cargo c on e.id_cargo = c.id_cargo";

        $dataMin = DB::select($salarioMin);
        $dataMax = DB::select($salarioMax);
        $dataTodo = DB::select($salarioTodos);
        $dataEdades = DB::select($edades);
        
        return view('empleado.reporte', get_defined_vars());
        
    }
}
