@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">

        @can('user')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-users"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('users.index') }}">Usuários</a></span>
                        <span class="info-box-number">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('locator')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-location-arrow"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('locators.index') }}">Localizadores</a></span>
                        <span class="info-box-number">{{ $totalLocators }}</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('reading')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-pen-alt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('readings.index') }}">Leituras</a></span>
                        <span class="info-box-number">{{ $totalReadings }}</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('order')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-clipboard"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('orders.index') }}">Pedidos</a></span>
                        <span class="info-box-number">{{ $totalOrders }}</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('report')
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-tasks"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('reports.index') }}">Laudos</a></span>
                        <span class="info-box-number">{{ $totalReports }}</span>
                    </div>
                </div>
            </div>
        @endcan

    </div>
@endsection
