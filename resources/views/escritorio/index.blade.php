@extends('adminlte::page')

@section('title', 'Menú Principal || SFN')

@section('content_header')
    <h1>Bienvenido {{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">



            <div class="card card-dark">
                <div class="card-header">
                    <h4 class="card-title">Mantenimiento</h4>

                    <div class="card-tools">
                        <!-- This will cause the card to maximize when clicked -->
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                        <!-- This will cause the card to collapse when clicked -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <!-- This will cause the card to be removed when clicked -->
                    </div>
                    <!-- /.card-tools -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- tarjeta para conteo de pisos-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    @php
                                        use App\Models\level;
                                        $cant_levels = level::count();
                                    @endphp
                                    <h3><span>{{ $cant_levels }}</span></h3>
                                    <p>Niveles</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <a href="level" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- tarjeta para conteo de marcas-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    @php
                                        use App\Models\Marca;
                                        $cant_marcas = marca::count();
                                    @endphp
                                    <h3><span>{{ $cant_marcas }}</span></h3>
                                    <p>Marcas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <a href="marca" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- tarjeta para conteo de estados-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    @php
                                        use App\Models\estado;
                                        $cant_estados = estado::count();
                                    @endphp
                                    <h3><span>{{ $cant_estados }}</span></h3>
                                    <p>Estado</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="estado" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>

                        </div>

                        <!-- tarjeta para conteo de categorias-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-gradient-warning">
                                <div class="inner">
                                    @php
                                        use App\Models\categoria;
                                        $cant_categorias = categoria::count();
                                    @endphp
                                    <h3><span>{{ $cant_categorias }}</span></h3>
                                    <p>Categorias</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <a href="categoria" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- tarjeta para conteo de libretas-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    @php
                                        use App\Models\modelo;
                                        $cant_modelos = Modelo::count();
                                    @endphp
                                    <h3><span>{{ $cant_modelos }}</span></h3>
                                    <p>Modelos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-qrcode"></i>
                                </div>
                                <a href="modelo" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- tarjeta para conteo de trabajadores-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    @php
                                        use App\Models\trabajador;
                                        $cant_workers = trabajador::count();
                                    @endphp
                                    <h3><span>{{ $cant_workers }}</span></h3>
                                    <p>Trabajadores</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <a href="trabajadores" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- tarjeta para conteo de libretas-->
                        <div class="col-md-4 col-xl-3">
                            <div class="small-box bg-light">
                                <div class="inner">
                                    @php
                                        use App\Models\area;
                                        $cant_areas = area::count();
                                    @endphp
                                    <h3><span>{{ $cant_areas }}</span></h3>
                                    <p>Areas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-map"></i>
                                </div>
                                <a href="area" class="small-box-footer">
                                    Acceder <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
