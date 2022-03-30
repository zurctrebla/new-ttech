@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>Equipamento *</label>
        <select name="equipment" class="form-control" required>
            <option value="">Escolha</option>
                @foreach($inventories as $inventory)
                    <option value="{{ $inventory->equipment }}" @if(isset($userinventory) && $inventory->name == $userinventory) selected @endif>
                        {{ $inventory->equipment }}
                    </option>
                @endforeach
        </select>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>Modelo *</label>
        <select name="model" class="form-control">
            <option value="">Escolha</option>
                {{-- @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if(isset($userRole) && $role->name == $userRole) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach --}}
        </select>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>Etiqueta Inicial *</label>
       <input type="text" name="inicial" class="form-control" placeholder="Etiqueta Inicial:" value="{{ $game->name ?? old('name') }}" >
      </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
       <label>Etiqueta Final *</label>
       <input type="text" name="final" class="form-control" placeholder="Etiqueta Final:" value="{{ $game->name ?? old('name') }}" >
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
