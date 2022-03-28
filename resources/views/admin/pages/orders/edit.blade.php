@extends('adminlte::page')

@section('title', 'Editar Pedido')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Pedido</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <span class="d-none d-md-block">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-info btn-sm">Listar</a>
                    @can('order-show')
                        <a href="{{ route('orders.show', $order->uuid) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                    @endcan
                    @can('order-delete')
                        <form action="{{ route('orders.destroy', $order->uuid) }}" style="display:inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o pedido ?')" >Apagar</button>
                        </form>
                    @endcan
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a href="{{ route('orders.show', $order->uuid) }}" class="btn btn-outline-info btn-sm">Listar</a>
                        @can('order-edit')
                            <a href="{{ route('orders.edit', $order->uuid) }}" class="dropdown-item">Editar</a>
                        @endcan
                        @can('order-delete')
                            <button class="dropdown-item" onclick="return confirm('Deseja apagar o pedido ?')">Apagar</button>
                        @endcan
                    </div>
                </div>
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
                <h3 class="card-title">Editar Pedido</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.update', $order->uuid) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.orders._partials.form')
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
