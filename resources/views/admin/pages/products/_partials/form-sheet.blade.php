@include('admin.includes.alerts')

@csrf

<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label>Carregar Planilha (.xml) *</label>
        <input type="file" name="file" class="form-control" >
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
