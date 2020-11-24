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
            <li><a href="<?php echo url('admin/home'); ?>">Admin</a></li>
            <li class="active">Orders</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Porudzbine <small></small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-outlined">
                        <div class="box-head">
                            <header><h4 class="text-light">Tabela sa svim Porudzbinama</h4></header>
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
                                                <th>&nbsp;&nbsp;&nbsp;</th>
                                                <th>#</th>
                                                <th>Porucioc</th>
                                                <th>Email</th>
                                                <th>Adresa</th>
                                                <th>Racun</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $num=>$order)
                                                    <tr id="{{ $order->id }}" class="gradeX">
                                                        <td style="text-align: center">
                                                            <a href="{{url('admin/orders/details/'.$order->id)}}"  title="Pogledaj Porudzbinu" >&#x1F447;</a>
                                                        </td>
                                                        <td>{{ $num + 1 }}</td>
                                                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                                                        <td>{{$order->email}}</td>
                                                        <td>{{$order->city}}, Ulica: {{$order->address}} {{$order->num_of_house}}/ Stan:{{$order->num_of_apartment}} </td>
                                                        <td>{{$order->total}} RSD</td>
                                                        <td>
                                                            @if($order->status == 0)
                                                                <form action="orderstatus-close/{{$order->id}}" method="POST">
                                                                    @csrf
                                                                <button class="checkbox" style="background-color: #15ba66; margin-top: 0px;margin-bottom: 0px;">Aktivna</button>
                                                                </form>
                                                            @else
                                                                <form action="orderstatus-open/{{$order->id}}" method="POST">
                                                                    @csrf
                                                                    <button class="checkbox" style="background-color: #929e99; margin-top: 0px;margin-bottom: 0px;">Isporučena</button>
                                                                </form>
                                                            @endif
                                                        </td>
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
                </div>
            </div>
        </div>
    </section>
@stop

@section('pageScripts')
    <script src="{{ asset('/assets/js/libs/DataTables/jquery.dataTables.js') }}"></script>

@stop
