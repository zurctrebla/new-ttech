@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
         <label>Tipo *</label>
         <select name="type" class="form-control" required>
            <option value="">Escolha</option>
            <option value="Montagem" @if(isset($order) && $order->type == 'Montagem') selected @endif >Montagem</option>
            <option value="Venda" @if(isset($order) && $order->type == 'Venda') selected @endif>Venda</option>
         </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Quantidade *</label>
            <input type="text" name="amount" class="form-control" placeholder="Quantidade:" value="{{ $order->amount ?? old('amount') }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Pedido / Lote *</label>
            <input type="text" name="number" class="form-control" placeholder="Número do Pedido ou Lote:" value="{{ $order->number ?? old('number') }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Observação</label>
       <input type="text" name="description" class="form-control" placeholder="Observação:" value="{{ $order->description ?? old('description') }}">
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Data de Entrega *</label>
         <input type="date" name="delivery" class="form-control" min="{{ date('Y-m-d') }}"  value="{{ $order->delivery ?? old('delivery') }}" required>
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
