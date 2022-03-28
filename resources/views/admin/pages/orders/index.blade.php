@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Listar</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('orders.create') }}" class="btn btn-outline-success btn-sm">Cadastrar</a>
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
                        <form action="{{-- {{ route('orders.search') }} --}}" method="POST" class="form form-inline">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{-- {{ $filters['filter'] ?? '' }} --}}">
                            <button type="submit" class="btn btn-dark">Filtrar</button>
                        </form>
                    </div>
                        <div class="card-body">
                            <table id="orders" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Solicitante</th>
                                        <th>Tipo</th>
                                        <th>Quantidade</th>
                                        <th>Observação</th>
                                        <th>Status</th>
                                        <th>Data da Entrega</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->user->name}}</td>
                                            <td>{{ $order->type }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>{{ $order->description }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->delivery }}</td>
                                            <td class="text-center">
                                                <span class="d-none d-md-block">
                                                    <a href="{{ route('orders.show', $order->uuid) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                    @can('order-edit')
                                                        <a href="{{ route('orders.edit', $order->uuid) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                                    @endcan
                                                    @can('order-delete')
                                                        <form action="{{ route('orders.destroy', $order->uuid) }}" style="display:inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar a permissão?')">Apagar</button>
                                                        </form>
                                                    @endcan
                                                </span>
                                                <div class="dropdown d-block d-md-none">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                        <a href="{{ route('orders.show', $order->uuid) }}" class="dropdown-item">Visualizar</a>
                                                        @can('order-edit')
                                                            <a href="{{ route('orders.edit', $order->uuid) }}" class="dropdown-item">Editar</a>
                                                        @endcan
                                                        @can('order-delete')
                                                            <button class="dropdown-item" onclick="return confirm('Deseja apagar a permissão?')">Apagar</button>
                                                        @endcan
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
                                {!! $orders->appends($filters)->links() !!}
                            @else
                                {!! $orders->links() !!}
                            @endif --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
