@csrf
<div class="form-group">
    <label for="title">Nombre del Rol</label>
    <input class="form-control border-0 bg-light shadow-sm"
           id="name"
           name="name"
           type="text"
           value="{{ old('name',$rol->name) }}">
</div>
<div class="form-group">
    <label for="url">Nombre del Rol</label>
    <input class="form-control border-0 bg-light shadow-sm"
           id="guard_name"
           name="guard_name"
           type="text"
           value="{{ old('guard_name', $rol->guard_name) }}">
</div>
<div class="from-group">
    <strong for="roles">Roles</strong>

        @foreach($permission as $perm)
        <div class="ml-5 mt-5 mb-5 form-check">

            <input class="form-check-input form-control border-0 bg-light shadow-sm"
                   type="checkbox"
                   name="permissions[]"
                   value="{{ old('permission', $perm->id )}}"
                   @if ($rol->permisions->contains($perm))
                   checked = "true"
                @endif
            >
            <label class="mt-2 form-check-label" for="">{{ $perm->name }} </label >
        </div>
    @endforeach

    <hr>
</div>

<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block " href="{{ route('roles.index') }}">
    Cancelar
</a>
