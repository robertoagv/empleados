<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado as ModelsEmpleado;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::get();
       // dd($empleados);
        return view('cargo.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 0;
        $tipoAccion = 'Crear Nuevo Cargo';
        $cargo = new Cargo();
        return view('cargo.create', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $tipoAccion = 'Actualizar Cargo';
        $cargo = Cargo::find($id);
        return view('cargo.create', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUpdate()
    {
         $datosCargo = request()->except('_token',"id_cargo");

         $id = request()->id_cargo;
         if($id)
         {
            Cargo::where("id_cargo", $id)->update($datosCargo);
         }else{
            Cargo::create($datosCargo);
         }
    
         return redirect("/cargos");
    }
    
    
    public function delete($id){
        $Cargo = Cargo::find($id);
        $Cargo->delete();
        return back();
    }

  
}
