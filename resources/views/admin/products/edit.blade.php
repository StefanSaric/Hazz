@extends('admin.dash')

@section('pageCss')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme-default/libs/wysihtml5/wysihtml5.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme-5/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme-5/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
@stop

@section('content')
    <section>
        <ol class="breadcrumb">
            <li><a href="<?php echo url('admin'); ?>">Admin</a></li>
            <li class="active">Editovanje Proizvoda</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Forma za izmenu Proizvoda</h3>
        </div>
        <div class="section-body">
            <div class="row">

                <!-- START HORIZONTAL BORDERED FORM -->
                <div class="col-lg-12">
                    <div class="box box-outlined">
                        <div class="box-head">
                            <header><h4 class="text-light"></h4></header>
                        </div>
                        <div class="box-body no-padding">
                            {!! Form::model($product, array('method' => 'PATCH', 'url' => 'admin/products/'.$product->id, 'class' => 'form-horizontal form-bordered form-validate', 'role' => 'form', 'novalidate' => 'novalidate', 'files' => true)) !!}
                            @include('admin.forms.products', ['submit' => 'Edit'])
                            {!! Form::close() !!}
                            @include('admin.forms.error')
                        </div>
                    </div>
                </div>
                <!-- END HORIZONTAL BORDERED FORM -->

            </div>
        </div>
    </section>
@stop


@section('pageScripts')
    <!-- END FILE UPLOAD TEMPLATES -->
    <script src="{{ asset('assets/js/libs/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/libs/jquery-validation/dist/additional-methods.js') }}"></script>
    <script src="{{ asset('assets/js/libs/wysihtml5/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/tags.js') }}"></script>
@stop
