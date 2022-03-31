@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>MAC *</label>
       <input type="text" name="mac" class="form-control" placeholder="MAC:" value="{{ $device->mac ?? old('mac') }}" required>
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
