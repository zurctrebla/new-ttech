@include('admin.includes.alerts')

@csrf

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Nome *</label>
       <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $permission->name ?? old('name') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Descrição *</label>
         <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $permission->description ?? old('description') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>
    </div>
</div>
