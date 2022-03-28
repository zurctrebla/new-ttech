@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
         <label>Equipamento *</label>
         <select name="equipment" class="form-control" required>
            <option value="">Escolha</option>{{--
            <option value="Montagem" @if(isset($order) && $order->type == 'Montagem') selected @endif >Montagem</option>
            <option value="Venda" @if(isset($order) && $order->type == 'Venda') selected @endif>Venda</option> --}}
         </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Modelo *</label>
            <select name="model" class="form-control" required>
                <option value="">Escolha</option>{{--
                <option value="Montagem" @if(isset($order) && $order->type == 'Montagem') selected @endif >Montagem</option>
                <option value="Venda" @if(isset($order) && $order->type == 'Venda') selected @endif>Venda</option> --}}
             </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Anormalidade *</label>
            <select name="abnormality" class="form-control" required>
                <option value="">Escolha</option>{{--
                <option value="Montagem" @if(isset($order) && $order->type == 'Montagem') selected @endif >Montagem</option>
                <option value="Venda" @if(isset($order) && $order->type == 'Venda') selected @endif>Venda</option> --}}
             </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Identificador *</label>
         <input type="text" name="tag" class="form-control" placeholder="Identificador / Etiqueta:" value="{{ $report->tag ?? old('tag') }}">
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
