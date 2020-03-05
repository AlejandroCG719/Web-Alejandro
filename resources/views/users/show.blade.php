@extends('layout')

@section('title', 'Portafolio | ' .$user->name)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <h1 class="display-4">{{ $user->name }}  {{ $user->role->name }}</h1>
            <p class="text-secondary ">
                {{ $user->email }}
            </p>
            <p class="text-black-50">
                {{ $user->created_at->diffForHumans() }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('users.index') }}">
                    Regresar
                </a>
                @auth
                    <div class="btn-group btn-group-sm ">
                        <a class="btn btn-primary"
                           href="{{ route('users.edit',$user) }}"
                        >Editar</a>

                        <a class="btn btn-danger"
                           href="#"
                           onclick="document.getElementById('delete-users').submit()">
                            Eliminar
                        </a>
                    </div>
                    <form id="delete-users"
                          class="d-none"
                          method="POST"
                          action="{{ route('users.destroy', $user) }}">
                        @csrf @method('DELETE')
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
