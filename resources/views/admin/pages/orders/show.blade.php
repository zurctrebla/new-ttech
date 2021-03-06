@extends('adminlte::page')

@section('title', 'Pedido')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Visualizar</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <span class="d-none d-md-block">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-info btn-sm">Listar</a>
                @can('order-edit')
                    <a href="{{ route('orders.edit', $order->uuid) }}" class="btn btn-outline-warning btn-sm">Editar</a>
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
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Visualizar</h3>
          </div>
          <div class="card-body">
            <div class="column-responsive column-80">
                <div class="inputs view content">
                    <table>
                        <tr>
                            <th><?= __('Solicitante') ?></th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th><?= __('Pedido / Lote') ?></th>
                            <td>{{ $order->number ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Tipo') ?></th>
                            <td>{{ $order->type ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Quantidade') ?></th>
                            <td>{{ $order->amount ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Observação') ?></th>
                            <td>{{ $order->description ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>{{ $order->status ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Data da Solicitação') ?></th>
                            <td>{{ $order->created_at ?? ''}}</td>
                        </tr>
                        <tr>
                            <th><?= __('Data da Entrega') ?></th>
                            <td>{{ $order->delivery ?? ''}}</td>
                        </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
