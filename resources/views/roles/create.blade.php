@extends('layout')

@section('title','Crear Rol')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded"
                      method="POST"
                      action="{{ route('roles.store') }}">
                    <h1 class="display-4">Nuevo Rol</h1>
                    <hr>
                    @include('roles._form' , ['btnText' => 'Guardar'])
                </form>
            </div>
        </div>
    </div>
@endsection
