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
            <li class="active">Products</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Proizvodi <small>Dodaj/Uredi</small></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-outlined">
                        <div class="box-head">
                            <header><h4 class="text-light">Tabela sa svim Proizvodima</h4></header>
                        </div>
                        <div id="buildingTable" class="box-body table-responsive">
                            {!! Form::open(array('method' => 'DELETE', 'id' => 'productForm', 'role' => 'form')) !!}
                            {!! Form::submit(null, ['id' => 'productButton', 'class' => 'btn btn-primary createEditButton', 'style' => 'display: none;']) !!}
                            {!! Form::close() !!}
                            <table id="datatable" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                    <th>Ime</th>
                                    <th>Cena</th>
                                    <th>Tekst</th>
                                    <th>Sifra</th>
                                    <th>Opis</th>
                                    <th>Tagovi</th>
                                    <th>Kategorije</th>
                                    <th>Slika</th>
                                    <th style="min-width: 85px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $num => $product)
                                    <tr id="{{ $product->id }}" class="gradeX">
                                        <td>&nbsp;&nbsp;&nbsp;{{ $num + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->text }}</td>
                                        <td>{{ $product->key}}</td>
                                        <td>{{ $product->description}}</td>
                                        <td>@foreach($product->tags as $tag)#{{ $tag->name }}<br/>@endforeach</td>
                                        <td>@foreach($product->categories as $category){{ $category->name }}@endforeach</td>
                                        <td><img src="{{asset($product->materials->first()->url)}}" height="150" width="150"></td>
                                        <td>
                                            <a href="{{ url('admin\products\\'.$product->id.'\edit') }}" class="btn btn-xs btn-success editPost" data-toggle="tooltip" data-placement="top" data-original-title="Uredi Proizvod"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ url('admin/products/delete/'.$product->id)}}" class="btn btn-xs btn-danger deletePost" data-toggle="tooltip" data-placement="top" data-original-title="Obriši Proizvod"><i class="fa fa-trash-o"></i></a>
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
    </section>
@stop

@section('pageScripts')
    <script src="{{ asset('/assets/js/libs/DataTables/jquery.dataTables.js') }}"></script>

@stop
