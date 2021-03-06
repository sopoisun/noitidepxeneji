@extends('metronic.layout')

@section('content')
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Stok Produk <small>Daftar stok produk</small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group">
                <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    <span>Actions</span> <i class="icon-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="{{ url('/produk/stok-print') }}" target="_blank">Print</a></li>
                </ul>
            </li>
            <li>
                <i class="icon-home"></i>
                <a href="javascript:void(0)">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="javascript:void(0)">Produk</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="javascript:void(0)">Daftar Stok Produk</a></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-comments"></i>Daftar Stok Produk</div>
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
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>HPP</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--*/
                                $no = 0;
                                $total = 0;
                            /*--}}
                            @foreach($produks as $produk)
                            {{--*/
                                $no++;
                                $total += $produk->hpp*$produk->sisa_stok;
                                $txt = '';
                                if( $produk->qty_warning > $produk->sisa_stok ){
                                    $txt = 'class="danger"';
                                }
                            /*--}}
                            <tr {!! $txt !!}>
                                <td>{{ $no }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ round($produk->sisa_stok, 2).' '.$produk->satuan }}</td>
                                <td style="text-align:right;">{{ number_format($produk->hpp, 0, ",", ".") }}</td>
                                <td style="text-align:right;">{{ number_format($produk->hpp*round($produk->sisa_stok, 2), 0, ",", ".") }}</td>
                            </tr>
                            @endforeach
                            <tr style="font-weight:bold;">
                                <td></td>
                                <td colspan="3">Total</td>
                                <td style="text-align:right;">{{ number_format($total, 0, ",", ".") }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop
