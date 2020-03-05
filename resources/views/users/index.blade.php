@extends('layout')

@section('title','Usuario')

@section('content')
    <div class="container">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-8 bg-white shadow rounded" src="/svg/WebDeveloperCeleste.svg" alt="Quien Soy">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">@lang('Users')</h1>
            @auth
                <a class="btn btn-primary"
                   href="{{ route('users.create') }}">
                    Crear Usuario
                </a>
            @endauth
        </div>
        <hr>
        <p class="lead text secondary"> Usuarios que se encuentra dados de alta en mi aplicacion.
        </p>
        <ul class="list-group">
            @forelse($users as $user)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class=" text-secondary d-flex justify-content-between align-items-center"
                       href="{{ route('users.show', $user) }}">
                        <span class=" font-weight-bold">
                            {{ $user->name }}
                        </span>
                        <span class="text-black-50">
                            {{ $user->email}}
                        </span>
                        <span class="text-black-50">
                            {{ $user->role->name }}
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

