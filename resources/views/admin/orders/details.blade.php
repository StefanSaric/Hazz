@extends('admin.dash')

@section('pageCss')
    <style>
        #activeImportant:hover{
            cursor: default !important;
        }
    </style>
@stop

@section('content')
    @if(Session::has('message'))
        <input id="message" type="hidden" value="{{ Session::get('message') }}" />
    @endif

    <section>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('admin'); ?>">Admin</a></li>
            <li><a class="active" href="<?php echo url('admin/orders'); ?>">Order</a></li>
            <li class="active">Details</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-o-left text-gray-light"></i> Porudzbine <small></small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-outlined">
                        <div class="box-head">
                            <header><h4 class="text-light">Tabela svih porucenih proizvoda za porucioca: <strong>{{$order->first_name}} {{$order->last_name}}</strong></h4></header>
                        </div>
                        <div id="buildingTable" class="box-body table-responsive">
                            {!! Form::open(array('method' => 'DELETE', 'id' => 'productForm', 'role' => 'form')) !!}
                            {!! Form::submit(null, ['id' => 'productButton', 'class' => 'btn btn-primary createEditButton', 'style' => 'display: none;']) !!}
                            {!! Form::close() !!}
                            <div id="datatablolder">
                                <div class="row">
                                    <div class="col s12">
                                        <table id="datatable" class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Proizvod</th>
                                                <th>Pakovanje</th>
                                                <th>Kolicina</th>
                                                <th>Cena</th>
                                                <th>Ukupna Cena</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->cart as $num=>$cart)
                                                    <td>{{ $num + 1 }}</td>
                                                    <td>{{$cart->product->product->name}} </td>
                                                    <td>{{$cart->product->quantity}} {{$cart->product->unit}}</td>
                                                    <td>{{$cart->quantity}}</td>
                                                    <td>{{$cart->price}} RSD</td>
                                                    <td>{{$cart->quantity*$cart->price}} RSD</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--end .box-body -->
                                </div><!--end .box -->
                            </div><!--end .col-lg-12 -->
                        </div>
                        <!-- END STRIPED TABLE -->
                    </div>
    </section>
@stop

@section('pageScripts')
    <script src="{{ asset('/assets/js/libs/DataTables/jquery.dataTables.js') }}"></script>

@stop
