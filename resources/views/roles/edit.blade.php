@extends('layout')

@section('title','Editar Roles')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded"
                      method="POST"
                      action="{{ route('roles.update', $rol) }}">
                    @method('PATCH')
                    <h1 class="display-4">Editar Usuario</h1>
                    @include('roles._form', ['btnText' => 'Actualizar'])
                </form>
            </div>
        </div>
    </div>

@endsection

