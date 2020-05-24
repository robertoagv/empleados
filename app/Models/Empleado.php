<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
    protected $fillable = array(
        "nombre",
        "apellido",
        "fecha_nac",
        "id_cargo"
    );
    public $incrementing = true;
    public $timestamps = false;

    public function cargo(){

        return $this->belongsTo("App\Models\Cargo","id_cargo", "id_cargo");
    }
    
}
