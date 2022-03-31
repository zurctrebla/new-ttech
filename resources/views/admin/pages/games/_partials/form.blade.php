@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>Nome *</label>
       <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $game->name ?? old('name') }}" required>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <p>
            <span class="text-danger">* </span>Campo obrigatório
        </p>
      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>
    </div>
</div>
