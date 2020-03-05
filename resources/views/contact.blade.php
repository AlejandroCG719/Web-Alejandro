@extends('layout')

@section('title','Contacto')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                @include('partials.session-status')
                <form  class="bg-white shadow rounded py-3 px-4"
                method="POST"
                action="{{ route('messages.store') }}">
                    @csrf
                    <h1 class="display-4">@lang('Contact') </h1>
                    <hr>
                    <div class="form-group">
                        <label for="fullname">Nombre</label>
                        <input class="form-control bg-light shadow-sm @error('fullname') is-invalid @else border-0 @enderror"
                               id="fullname"
                               name="fullname"
                               placeholder="Escribe aquí tu nombre..."
                               value="{{ old('fullname') }}">
                        @error('fullname')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullname">Correo electrónico</label>
                        <input class="form-control bg-light shadow-sm @error('fullname') is-invalid @else border-0 @enderror"
                               id="email"
                               name="email"
                               type="email"
                               placeholder="Escribe aquí tu e-mail ..."
                               value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Asunto</label>
                        <input class="form-control bg-light shadow-sm @error('fullname') is-invalid @else border-0 @enderror"
                               id="subject"
                               name="subject"
                               placeholder="Escribe aquí el asunto de tu mensaje..."
                               value="{{ old('subject') }}">
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea class="form-control bg-light shadow-sm @error('fullname') is-invalid @else border-0 @enderror"
                                  id="content"
                                  name="content"
                                  placeholder="Mensaje ...">{{ old('content') }}  </textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <button class="btn  btn-primary btn-lg btn-block"> @lang('Send') </button>

                </form>
            </div>
            <div class="col-12 col-lg-6">
                <img class="img-fluid mb-8 bg-white shadow rounded" src="/svg/DesignerCeleste.svg" alt="Quien Soy">
                <p>
                    Pueden mandar mensaje y me llegara directa a mi correo personal y me pondre en contacto con ustdes.
                    Muchas Gracias...!!
                </p>
            </div>
        </div>
    </div>
@endsection
