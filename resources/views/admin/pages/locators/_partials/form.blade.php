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
         <select name="partner" class="form-control" required>
            <option value="">Escolha</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->uuid }}" @if(isset($PartnerName) && $partner->name == $PartnerName) selected @endif>
                        {{ $partner->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Cliente </label>
         <select name="client" class="form-control">
            <option value="">Escolha</option>
                @foreach($clients as $client)
                    <option value="{{ $client->uuid }}" {{-- @if(isset($userclient) && $client->name == $userclient) selected @endif --}}>
                        {{ $client->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Jogo *</label>
         <select name="game" class="form-control" required>
            <option value="">Escolha</option>
                @foreach($games as $game)
                    <option value="{{ $game->uuid }}" {{-- @if(isset($usergame) && $game->name == $usergame) selected @endif --}}>
                        {{ $game->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
         <label>Dispositivo </label>
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
        <p>
            <span class="text-danger">* </span>Campo obrigatório
        </p>
      <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
      </div>
    </div>
</div>
