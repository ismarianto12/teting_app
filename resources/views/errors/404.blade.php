@extends('layouts.template')
@section('title','Halaman Salah 403 Forbiden')
@section('content')


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Laporan Penerimaaan</h2>
                <h5 class="text-white op-7 mb-2"> Pendapatapan Daerah </h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Rerport Penerimaan</a>
                <a href="#" to="#" class="tambah btn btn-secondary btn-round">Data Penerimaaan </a>
            </div>
        </div>
    </div>
</div>


<div class="page bg-light">
    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-body">
                <div class="form-group form-show-validation row">
                    @php
                    echo __('Not Found');
                    @endphp
                    <hr />
                   <a href="javascript:history.go(-1)" class="btn btn-primary">Ke Halaman sebelumny</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection