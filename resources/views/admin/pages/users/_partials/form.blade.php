@include('admin.includes.alerts')
@csrf
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <label>Nome *</label>
       <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $user->name ?? old('name') }}" required>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Email *</label>
         <input type="email" name="email" class="form-control" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
         <label>Senha </label>
         <input type="password" name="password" class="form-control" placeholder="Senha">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
         <label>Nível de Acesso *</label>
         <select name="role_id" class="form-control" required>
            <option value="">Escolha</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if(isset($userRole) && $role->name == $userRole) selected @endif>
                        {{ $role->name }}
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
