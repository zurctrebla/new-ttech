@extends('adminlte::page')

@section('title', 'Editar Laudo')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Laudo</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <span class="d-none d-md-block">
                    <a href="{{ route('reports.index') }}" class="btn btn-outline-info btn-sm">Listar</a>
                    @can('report-show')
                        <a href="{{ route('reports.show', $report->uuid) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                    @endcan
                    @can('report-delete')
                        <form action="{{ route('reports.destroy', $report->uuid) }}" style="display:inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o laudo ?')" >Apagar</button>
                        </form>
                    @endcan
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a href="{{ route('reports.show', $report->uuid) }}" class="btn btn-outline-info btn-sm">Listar</a>
                        @can('report-edit')
                            <a href="{{ route('reports.edit', $report->uuid) }}" class="dropdown-item">Editar</a>
                        @endcan
                        @can('report-delete')
                            <button class="dropdown-item" onclick="return confirm('Deseja apagar o laudo ?')">Apagar</button>
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
                <h3 class="card-title">Editar Laudo</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reports.update', $report->uuid) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.reports._partials.form')
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
