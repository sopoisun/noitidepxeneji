@extends('metronic.layout')

@section('content')
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Daftar Karyawan
        </h3>

        {!! Breadcrumbs::render('admin_karyawan') !!}
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
                <div class="caption"><i class="icon-comments"></i>Daftar Karyawan</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>No HP</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--*/ $no = 0; /*--}}
                            @foreach($karyawans as $karyawan)
                            {{--*/
                                $show = true;
                                if( $karyawan->user != null ){
                                    if( $karyawan->user->roles->contains('key', 'superuser') ){
                                        $show = false;
                                    }
                                }
                            /*--}}
                            @if($show)
                            {{--*/ $no++; /*--}}
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->no_hp }}</td>
                                <td>{{ $karyawan->jabatan }}</td>
                                <td>{{ $karyawan->alamat }}</td>
                                <td>
                                    @can('report.perbulan.karyawan')
                                    <a href="{{ url('/karyawan/report/perbulan?karyawan_id='.$karyawan->id) }}" title="Laporan Perbulan" class="btn btn-sm blue"><i class="icon-calendar"></i></a>
                                    @endcan
                                    @can('report.pertahun.karyawan')
                                    <a href="{{ url('/karyawan/report/pertahun?karyawan_id='.$karyawan->id) }}" title="Laporan Pertahun" class="btn btn-sm blue"><i class="icon-book"></i></a>
                                    @endcan
                                    @can('karyawan.update')
                                    <a href="{{ url('/karyawan/edit/'.$karyawan->id) }}" class="btn btn-sm yellow"><i class="icon-edit"></i></a>
                                    @endcan
                                    @can('karyawan.delete')
                                    <a href="{{ url('/karyawan/delete/'.$karyawan->id) }}" onclick="return confirm('Yakin hapus {{ $karyawan->nama }} ??')" class="btn btn-sm red"><i class="icon-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endif
                            @endforeach
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
