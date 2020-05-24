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

                    <form action="{{url('/cargos/nuevo')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_cargo" value="{{ $id }}" />
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cargo->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $cargo->descripcion}}">
                        </div>
                        <div class="form-group">
                            <label for="salario">Salario:</label>
                            <input type="number" class="form-control" step="any" id="salario" name="salario" value="{{ $cargo->salario}}">
                        </div>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection