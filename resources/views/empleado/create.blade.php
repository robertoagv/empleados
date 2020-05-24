@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{$tipoAccion}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('/empleados/nuevo')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}" />
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $modelEmpleado->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $modelEmpleado->apellido}}">
                        </div>
                        <div class="form-group">
                            <label for="fecha_nac">Fecha Naciomiento:</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $modelEmpleado->fecha_nac}}">
                        </div>
                        <div class="form-group">
                            <label for="id_cargo">Cargo:</label>
                            <select name="id_cargo" class="form-control">
                                @foreach($modelCargo as $kc => $vc)
                                @php($selected = in_array($modelEmpleado->id_cargo, $modelCargo->keys()->toArray()) ? 'selected' : null)

                                <option value ="{{$kc}}" {{ $selected }}> {{$vc}} </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection