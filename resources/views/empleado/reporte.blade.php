@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <br>
        <div class="card">
            <div class="card-body">
               <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                        Sueldo Maximo
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                        Mismo Salario
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                        Edades
                        </a>
                        <a class="nav-item nav-link" id="nav-min-tab" data-toggle="tab" href="#nav-min" role="tab" aria-controls="nav-contact" aria-selected="false">
                        Sueldo Minimo
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <p>
                    {{ $dataMax[0]->nombre." ". $dataMax[0]->apellido }}  <b>Q. {{ $dataMax[0]->salario}}</b>
                    </p>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                              <th scope="col">Puesto</th>
                            <th scope="col">Salario</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(collect($dataTodo)->groupBy("salario") as $vt)

                            @foreach($vt as $kk=> $vv)
                            <tr>
                                <td>{{  $vv->nombre." ". $vv->apellido }}</td>
                                <td>{{  $vv->puesto}}</td>
                                <td rowspan="{{ count($vt) }}" style="vertical-align: middle;" > {{ $kk ==0 ?  $vv->salario : null}} </td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                        </table>
                
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Edad</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataEdades as $vv)
                         <tr>
                                <td>{{  $vv->nombre." ". $vv->apellido }}</td>
                                <td>{{  $vv->puesto }}</td>
                                <td> {{ $vv->edad }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                 <div class="tab-pane fade" id="nav-min" role="tabpanel" aria-labelledby="nav-min-tab">
                  <br>
                    <p>
                        {{ $dataMin[0]->nombre." ". $dataMin[0]->apellido }}  <b>Q. {{ $dataMin[0]->salario}}</b>
                    </p>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

