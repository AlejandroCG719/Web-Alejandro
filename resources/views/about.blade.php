@extends('layout')

@section('title','Quien Soy')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 ">
                <img class="img-fluid mb-4" src="/svg/OnlineCvCeleste.svg" alt="Quien Soy">
            </div>
            <div class="col-12 col-lg-6 ">
                <h1 class="display-4 text-primary"> @lang('About')</h1>
                <p class="lead text-secondary">
                    Mi nombre es Alejandro un chico de 22 años, con mas de un año y medio de experiencia de desarrollador
                    Me gusta aprender de todos las personas por que me ayudar a mi cremiento en esta ramay tambien aprender
                    nuevas cosas no suelo ser una persona que se conforma siempre anhelo a mas, Tengo un caracter un poco
                    especial a veces, pero suleo ser una buena personas que convive bien con todos soy muy sincero.
                </p>
            </div>

        </div>
    </div>

@endsection

