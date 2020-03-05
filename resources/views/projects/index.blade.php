@extends('layout')

@section('title','Portafolio')

@section('content')
    <div class="container">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-8 bg-white shadow rounded" src="/svg/ProgrammingCeleste.svg" alt="Quien Soy">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">@lang('Projects')</h1>
            @auth
                <a class="btn btn-primary"
                href="{{ route('projects.create') }}">
                    Crear Proyecto
                </a>
            @endauth
        </div>
        <hr>
        <p class="lead text secondary"> Proyecto realizados.
        </p>
        <ul class="list-group">
            @forelse($projects as $project)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class=" text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('projects.show', $project) }}">
                        <span class=" font-weight-bold">
                            {{ $project->title }}
                        </span>
                        <span class=" font-weight-bold">
                            {{ $project->url }}
                        </span>
                        <span class="text-black-50">
                            {{ $project->created_at->format('d/m/Y') }}
                        </span>
                    </a>
                </li>

            @empty
                <li  class="list-group-item border-0 mb-3 shadow-sm">
                    No hay Proyectos para mostrar
                </li>
            @endforelse
            {{ $projects->links() }}
        </ul>
    </div>

@endsection

