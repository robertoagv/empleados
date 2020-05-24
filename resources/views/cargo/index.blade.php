@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <a href="{{url('/cargos/nuevo')}}" class="btn btn-success">Nuevo</a>
        <br><br>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Salario</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cargos as $k=> $cargo)
                          <tr id="row{{ $cargo->id_cargo }}">
                              <td>{{$loop->iteration}}</td>
                              <td>{{$cargo->nombre}}</td>
                              <td>{{$cargo->descripcion}}</td>
                              <td>{{$cargo->salario}}</td>
                              <td>
                                <a class="btn btn-primary btn-xs" href="/cargos/actualizar/{{$cargo->id_cargo}}" >Actualizar</a>
                              </td>
                              <td>
                                <a class="btn btn-danger btn-xs" href="/cargos/eliminar/{{$cargo->id_cargo}}" >Eliminar</a>
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

