@extends('adminlte::page')

@section('title', 'Localizadores')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Listar</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('locators.create') }}" class="btn btn-outline-success btn-sm">Cadastrar</a>
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
                        <form action="{{-- {{ route('locators.search') }} --}}" method="POST" class="form form-inline">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{-- {{ $filters['filter'] ?? '' }} --}}">
                            <button type="submit" class="btn btn-dark">Filtrar</button>
                        </form>
                    </div>
                        <div class="card-body">
                            <table id="locators" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Localizador</th>
                                        <th>Serial</th>
                                        <th>Jogo</th>
                                        <th>Parceiro</th>
                                        <th>Cliente</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locators as $locator)
                                        <tr>
                                            <td>{{ $locator->locator }}</td>
                                            <td>{{ $locator->serial }}</td>
                                            <td>{{ $locator->game->name }}</td>
                                            <td>{{ $locator->partner->name }}</td>
                                            <td>{{ $locator->client->name }}</td>
                                            <td class="text-center">
                                                <span class="d-none d-md-block">
                                                    <a href="{{ route('locators.show', $locator->uuid) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                        <a href="{{ route('locators.edit', $locator->uuid) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                                        <form action="{{ route('locators.destroy', $locator->uuid) }}" style="display:inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o localizador ?')" >Apagar</button>
                                                        </form>
                                                </span>
                                                <div class="dropdown d-block d-md-none">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                        <a href="{{ route('locators.show', $locator->uuid) }}" class="dropdown-item">Visualizar</a>
                                                        <a href="{{ route('locators.edit', $locator->uuid) }}" class="dropdown-item">Editar</a>
                                                        <button class="dropdown-item" onclick="return confirm('Deseja apagar o localizador ?')">Apagar</button>
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
                                {!! $locators->appends($filters)->links() !!}
                            @else
                                {!! $locators->links() !!}
                            @endif --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
