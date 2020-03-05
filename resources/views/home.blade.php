@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 ">
                <h1 class="display-4 text-primary">Desarrollador Jr</h1>
                <p class="lead text-secondary">

                    <li>Tengo la capacidad de investigar las necesidades de los usuarios para poder diseñar y elabrar las aplicaciones asi tambien
                    como hacer la pruebas para ver el correcto funcionamiento de la aplicacion.</li>
                    <li>Tambien detectar los errores en las aplicaciones y corregirlos, para poder el evaluar los nuevos y/o existentes sistemas a desarrollar o que esten en produccion.</li>
                    <li> Trabajar en conjunto con el resto del equipo para ver el progreso del desarrollo de la aplicacion y detectar posibles mejoras y realizar sugerencias o requerimientos que puedan hacer falta...</li>
                </p>
                <a  class="btn btn-lg btn-block btn-primary"
                    href="{{ route('contact') }}">
                    Contáctame
                </a>
                <a class="btn btn-lg btn-block btn-outline-primary"
                   href="{{ route('projects.index') }}">
                    Portafolio
                </a>
            </div>
            <div class="col-12 col-lg-6 ">
                <img class="img-fluid mb-4" src="/svg/codyCeleste.svg" alt="Desarrolador Jr">
            </div>
        </div>
    </div>

@endsection
