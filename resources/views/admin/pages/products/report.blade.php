@extends('adminlte::page')

@section('title', 'Relatório')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Relatórios</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

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

                    </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                  <a class="nav-link active" id="{{date('Y')}}-tab" data-toggle="tab" href="#{{date('Y')}}" role="tab" aria-controls="{{date('Y')}}" aria-selected="true">{{date('Y')}}</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="{{date('Y')}}" role="tabpanel" aria-labelledby="{{date('Y')}}-tab">
                                    <table class="table">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Equipamento</th>
                                            <th scope="col">Ações</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>
                                                        {{ $product->inventory->equipment}}
                                                    </td>
                                                    <td>
                                                        ação
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                              </div>
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
