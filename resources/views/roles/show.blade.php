@extends('layout')

@section('title', 'Portafolio | ' .$rol->name)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <h1 class="display-4">{{ $rol->name }}</h1>
            <p class="text-black-50">
                {{ $rol->created_at->diffForHumans() }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('users.index') }}">
                    Regresar
                </a>
                @auth
                    <div class="btn-group btn-group-sm ">
                        <a class="btn btn-primary"
                           href="{{ route('roles.edit',$rol) }}"
                        >Editar</a>

                        <a class="btn btn-danger"
                           href="#"
                           onclick="document.getElementById('delete-roles').submit()">
                            Eliminar
                        </a>
                    </div>
                    <form id="delete-roles"
                          class="d-none"
                          method="POST"
                          action="{{ route('roles.destroy', $rol) }}">
                        @csrf @method('DELETE')
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
