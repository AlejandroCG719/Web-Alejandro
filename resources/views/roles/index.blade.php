@extends('layout')

@section('title','Roles')

@section('content')
    <div class="container">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-8 bg-white shadow rounded" src="/svg/codeTypingCeleste.svg" alt="Quien Soy">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">@lang('Rol')</h1>
            @auth
                <a class="btn btn-primary"
                   href="{{ route('roles.create') }}">
                    Crear Roles
                </a>
            @endauth
        </div>
        <hr>
        <p class="lead text secondary"> Roles que existen en mi aplicacion para que cada uno tenga acceso liminado y no pueda hacer algo indevido
        </p>
        <ul class="list-group">
            @forelse($roles as $rol)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class=" text-secondary d-flex justify-content-between align-items-center"
                       href="{{ route('roles.show', $rol) }}">
                        <span class=" font-weight-bold">
                            {{ $rol->name }}
                        </span>
                        <span class="text-black-50">
                            {{ $rol->created_at}}
                        </span>
                    </a>
                </li>

            @empty
                <li  class="list-group-item border-0 mb-3 shadow-sm">
                    No hay Proyectos para mostrar
                </li>
            @endforelse
            {{--{{ $user->links() }}--}}
        </ul>
    </div>
@endsection

