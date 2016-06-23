@extends('metronic.layout')

@section('css_assets')
<link href="{{ url('/') }}/assets/metronic/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Laporan Adjustment
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="javascript:void(0)">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{ url('/report') }}">Laporan</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{ url('/report/perbulan') }}">Perbulan</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{ url('/report/perbulan/adjustment') }}">Adjustment</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="javascript:void(0)">Laporan Adjustment {{ $tanggal->format('M Y') }}</a></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-filter"></i>Filter Bulan</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['method' => 'GET', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'formTanggalFilter']) !!}
                    <div class="form-body">
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal" class="col-md-3 control-label">Bulan</label>
                                    <div class="col-md-8">
                                    {{ Form::text('bulan', $tanggal->format('Y-m'), ['class' => 'form-control tanggalan', 'id' => 'bulan', 'data-date-format' => 'yyyy-mm']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn red">Tampilkan</button>
                                    <a href="{{ url('/report/perbulan/adjustment-print?bulan='.$tanggal->format('Y-m')) }}"
                                        target="_blank" class="btn blue">
                                        Print
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Daftar Adjustment (+) {{ $tanggal->format('M Y') }}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Nama Type</th>
                                <th>Harga ( Avg )</th>
                                <th>Stok</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($adjustments['increase']))
                            {{--*/ $no = 0; /*--}}
                            @foreach($adjustments['increase'] as $adjustment)
                            {{--*/ $no++; /*--}}
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $adjustment['nama'] }}</td>
                                <td>{{ ucfirst($adjustment['type']) }}</td>
                                <td>{{ number_format($adjustment['harga_avg'], 0, ',', '.') }}</td>
                                <td>{{ $adjustment['qty_stok'].' '.$adjustment['satuan'] }}</td>
                                <td style="text-align:right;">{{ number_format($adjustment['subtotal'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td colspan="4">Total</td>
                                <td style="text-align:right;">{{ number_format(collect($adjustments['increase'])->sum('subtotal'), 0, ',', '.') }}</td>
                            </tr>

                            @else
                            <tr>
                                <td colspan="6" style="text-align:center;">No Data Here</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Daftar Adjustment (-) {{ $tanggal->format('M Y') }}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Nama Type</th>
                                <th>Harga ( Avg )</th>
                                <th>Stok</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($adjustments['reduction']))
                            {{--*/ $no = 0; /*--}}
                            @foreach($adjustments['reduction'] as $adjustment)
                            {{--*/ $no++; /*--}}
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $adjustment['nama'] }}</td>
                                <td>{{ ucfirst($adjustment['type']) }}</td>
                                <td>{{ number_format($adjustment['harga_avg'], 0, ',', '.') }}</td>
                                <td>{{ $adjustment['qty_stok'].' '.$adjustment['satuan'] }}</td>
                                <td style="text-align:right;">{{ number_format($adjustment['subtotal'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td colspan="4">Total</td>
                                <td style="text-align:right;">{{ number_format(collect($adjustments['reduction'])->sum('subtotal'), 0, ',', '.') }}</td>
                            </tr>

                            @else
                            <tr>
                                <td colspan="6" style="text-align:center;">No Data Here</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="modal fade" id="ajax" tabindex="-1" role="basic" aria-hidden="true">
    <img src="{{ url('/') }}/assets/metronic/img/ajax-modal-loading.gif" alt="" class="loading">
</div>
<!-- END PAGE CONTENT-->
@stop

@section('js_assets')
<script src="{{ url('/') }}/assets/metronic/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
@stop

@section('js_section')
<script>
    $(".tanggalan").datepicker({
        viewMode: 1,
        minViewMode: 1
    });

    $("#ajax").on("show.bs.modal", function(e) {
        $(this).removeData('bs.modal');
    });
</script>
@stop
