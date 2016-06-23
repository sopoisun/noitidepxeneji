@extends('metronic.layout')

@section('content')
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            General Setting
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="javascript:void(0)">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{ url('/setting') }}">General Setting</a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-6">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-cogs"></i> Form Setting
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="" class="reload"></a>
                    <a href="" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::model($setting, ['role' => 'form']) !!}
                    <div class="form-body">
                        <div class="form-group @if($errors->has('web_name')) has-error @endif">
                            <label for="title_faktur" class="control-label">Nama Web</label>
                            {{ Form::text('web_name', null, ['class' => 'form-control', 'id' => 'web_name']) }}
                            @if($errors->has('web_name'))<span class="help-block">{{ $errors->first('web_name') }}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('phone')) has-error @endif">
                            <label for="phone" class="control-label">Telp</label>
                            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                            @if($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('address')) has-error @endif">
                            <label for="address" class="control-label">Alamat</label>
                            {{ Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'rows' => '4']) }}
                            @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn yellow btnSubmit">Simpan</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop
