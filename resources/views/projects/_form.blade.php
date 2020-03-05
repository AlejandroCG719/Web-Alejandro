@csrf
<div class="form-group">
    <label for="title">Titulo del proyecto</label>
        <input class="form-control border-0 bg-light shadow-sm"
               id="title"
               name="title"
               type="text"
               value="{{ old('title',$project->title) }}">
</div>
<div class="form-group">
<label for="url">Url del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm"
           id="url"
           name="url"
           type="text"
           value="{{ old('url', $project->url) }}">
</div>
<div class="from-group">
    <label for="description">Descripcion del proyecto</label>
        <textarea class="form-control border-0 bg-light shadow-sm"
                  id="description"
                  name="description"
                  type="text"
        >{{ old('description',$project->description) }}
        </textarea>
    <hr>
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block " href="{{ route('projects.index') }}">
    Cancelar
</a>
