@extends('layout')

@section('title','Editar Usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.validation-errors')
                <form class="bg-white py-3 px-4 shadow rounded"
                      method="POST"
                      action="{{ route('users.update', $user) }}">
                    @method('PATCH')
                    <h1 class="display-4">Editar Usuario</h1>
                    @include('users._form', ['btnText' => 'Actualizar'])
                </form>
            </div>
        </div>
    </div>

@endsection

