@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
         <label>Parceiro *</label>
         <select name="partner" class="form-control">
            <option value="">Escolha</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->uuid }}" @if(isset($userpartner) && $partner->name == $userpartner) selected @endif>
                        {{ $partner->name }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Localizador *</label>
         <select name="locator" class="form-control">
            <option value="">Escolha</option>
                @foreach($locators as $locator)
                    <option value="{{ $locator->uuid }}" @if(isset($userlocator) && $locator->name == $userlocator) selected @endif>
                        {{ $locator->locator }}
                    </option>
                @endforeach
         </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Entrada *</label>
       <input type="text" name="input" class="form-control" placeholder="Input:" value="{{ $reading->input ?? old('input') }}" >
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Saída *</label>
         <input type="text" name="output" class="form-control" placeholder="Output:" value="{{ $reading->output ?? old('output') }}" >
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
