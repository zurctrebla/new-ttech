@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Nome *</label>
       <input type="text" name="product" class="form-control" placeholder="Nome:" value="{{ $inventory->product ?? old('product') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Descrição *</label>
         <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $inventory->description ?? old('description') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Marca *</label>
       <input type="text" name="brand" class="form-control" placeholder="Marca:" value="{{ $inventory->brand ?? old('brand') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Modelo *</label>
         <input type="text" name="model" class="form-control" placeholder="Modelo:" value="{{ $inventory->model ?? old('model') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Etiqueta *</label>
       <input type="text" name="tag" class="form-control" placeholder="Marca:" value="{{ $inventory->tag ?? old('tag') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Quantidade *</label>
         <input type="text" name="amount" class="form-control" placeholder="Quantidade Inicial:" value="{{ $inventory->amount ?? old('amount') }}" >
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
