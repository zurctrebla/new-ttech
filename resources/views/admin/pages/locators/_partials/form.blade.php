@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Localizador *</label>
       <input type="text" name="locator" class="form-control" placeholder="Localizador:" value="{{ $locator->locator ?? old('locator') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Serial *</label>
         <input type="text" name="serial" class="form-control" placeholder="Serial:" value="{{ $locator->serial ?? old('serial') }}" >
        </div>
      </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
         <label>Parceiro *</label>
         <select name="partner" class="form-control">
            <option value="">Escolha</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->uuid }}" {{-- @if(isset($userpartner) && $partner->name == $userpartner) selected @endif --}}>
                        {{ $partner->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Cliente *</label>
         <select name="client_id" class="form-control">
            <option value="">Escolha</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{-- @if(isset($userclient) && $client->name == $userclient) selected @endif --}}>
                        {{ $client->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Jogo *</label>
         <select name="game_id" class="form-control">
            <option value="">Escolha</option>
                @foreach($games as $game)
                    <option value="{{ $game->id }}" {{-- @if(isset($usergame) && $game->name == $usergame) selected @endif --}}>
                        {{ $game->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Dispositivo *</label>
         <select name="device_id" class="form-control">
            <option value="">Escolha</option>
                @foreach($devices as $device)
                    <option value="{{ $device->id }}" {{-- @if(isset($userdevice) && $device->mac == $userdevice) selected @endif --}}>
                        {{ $device->mac }}
                    </option>
                @endforeach
         </select>
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
