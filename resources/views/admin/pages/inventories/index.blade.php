@extends('adminlte::page')

@section('title', 'Estoque')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Listar</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('inventories.create') }}" class="btn btn-outline-success btn-sm">Cadastrar</a>
            </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <form action="{{-- {{ route('inventories.search') }} --}}" method="POST" class="form form-inline">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{-- {{ $filters['filter'] ?? '' }} --}}">
                            <button type="submit" class="btn btn-dark">Filtrar</button>
                        </form>
                    </div>
                        <div class="card-body">
                            <table id="inventories" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->product }}</td>
                                            <td>{{ $inventory->amount }}</td>
                                            <td class="text-center">
                                                <span class="d-none d-md-block">
                                                    <a href="{{ route('inventories.show', $inventory->uuid) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                        <a href="{{ route('inventories.edit', $inventory->uuid) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                                        <form action="{{ route('inventories.destroy', $inventory->uuid) }}" style="display:inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o estoque ?')" >Apagar</button>
                                                        </form>
                                                </span>
                                                <div class="dropdown d-block d-md-none">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                        <a href="{{ route('inventories.show', $inventory->uuid) }}" class="dropdown-item">Visualizar</a>
                                                        <a href="{{ route('inventories.edit', $inventory->uuid) }}" class="dropdown-item">Editar</a>
                                                        <button class="dropdown-item" onclick="return confirm('Deseja apagar o estoque ?')">Apagar</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{-- @if (isset($filters))
                                {!! $games->appends($filters)->links() !!}
                            @else
                                {!! $games->links() !!}
                            @endif --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
