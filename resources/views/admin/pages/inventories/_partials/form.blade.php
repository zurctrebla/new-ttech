@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Equipamento *</label>
       <input type="text" name="equipment" class="form-control" placeholder="Nome do Equipamento:" value="{{ $inventory->equipment ?? old('equipment') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Condição *</label>
         <input type="text" name="condition" class="form-control" placeholder="Condição:" value="{{ $inventory->condition ?? old('condition') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
       <label>Marca </label>
       <input type="text" name="brand" class="form-control" placeholder="Marca:" value="{{ $inventory->brand ?? old('brand') }}" >
      </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Modelo *</label>
         <input type="text" name="model" class="form-control" placeholder="Modelo:" value="{{ $inventory->model ?? old('model') }}" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
         <label>Quantidade *</label>
         <input type="text" name="amount" class="form-control" placeholder="Quantidade Inicial:" value="{{ $inventory->amount ?? old('amount') }}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" name="export" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Exibir na manutenção?</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <p>
            <span class="text-danger">* </span>Campo obrigatório
        </p>
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>
    </div>
</div>
