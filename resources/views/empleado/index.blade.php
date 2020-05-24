@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <a href="{{url('/empleados/nuevo')}}" class="btn btn-success">Nuevo</a>
        <br><br>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimiento</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($empleados as $k=> $empleado)
                          <tr id="row{{ $empleado->id_empleado }}">
                              <td>{{$loop->iteration}}</td>
                              <td>{{$empleado->nombre}}</td>
                              <td>{{$empleado->apellido}}</td>
                              <td>{{$empleado->fecha_nac}}</td>
                              <td>{{$empleado->cargo->nombre}}</td>
                              <td>{{$empleado->cargo->salario}}</td>
                              <td>
                                <a class="btn btn-primary btn-xs" href="/empleados/actualizar/{{$empleado->id_empleado}}" >Actualizar</a>
                              </td>
                              <td>
                                <a class="btn btn-danger btn-xs" href="/empleados/eliminar/{{$empleado->id_empleado}}" >Eliminar</a>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection

