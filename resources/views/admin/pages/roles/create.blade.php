@extends('adminlte::page')

@section('title', 'Cadastrar Nível de Acesso')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Cadastrar Nível de Acesso</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <span class="d-none d-md-block">
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-info btn-sm">Listar</a>
                </span>
                <div class="dropdown d-block d-md-none">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-info btn-sm">Listar</a>
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
                <h3 class="card-title">Novo Nível de Acesso</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.roles._partials.form')
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
@endsection
