@csrf
<div class="form-group">
    <label for="title">Nombre del Usuaio</label>
        <input class="form-control border-0 bg-light shadow-sm"
               id="name"
               name="name"
               type="text"
               value="{{ old('name',$user->name) }}">
</div>
<div class="form-group">
<label for="url">Email del Usuario</label>
    <input class="form-control border-0 bg-light shadow-sm"
           id="email"
           name="email"
           type="text"
           value="{{ old('email', $user->email) }}">
</div>
<div class="from-group">
    <label for="roles">Roles</label>
    <select class="form-control border-0 bg-light shadow-sm"
              id="id_role"
              name="id_role"
    >
        <option>------- Selecionar---------</option>
        @foreach($roles as $role)
            <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
         @endforeach
        </select>
    <hr>
</div>

<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block " href="{{ route('users.index') }}">
    Cancelar
</a>
