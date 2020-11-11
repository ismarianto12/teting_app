@extends('layouts.template')

@section('content')
<div class="page bg-light">
    @include('layouts._includes.toolbar')
    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card">
            <div class="card-body">
                <div class="form-row form-inline">
                    <div class="col-md-12">
                        <div class="form-group m-0">
                            <label class="col-form-label s-12 col-md-2"><strong>Kode Rek. Akun :</strong></label>
                            <label class="r-0 s-12 col-md-8 tl">[ {{ $tmrekening_akun->kd_rek_akun }} ] &nbsp; {{ $tmrekening_akun->nm_rek_akun }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body no-b">
                <form class="needs-validation" id="form" method="POST" novalidate>
                    {{ method_field('POST') }}
                    <input type="hidden" name="tmrekening_akun_id" value="{{ $tmrekening_akun->id }}" />
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="30"></th>
                                <th width="150">Kode Rek. Kelompok ( <span class="text-danger">*</span> )</th>
                                <th>Nama Rek. Kelompok ( <span class="text-danger">*</span> )</th>
                                <th width="120">Kode Rek. Aset</th>
                                <th width="120">Kode Rek. Akrual</th>
                                <th width="120">Kode Rek. Utang</th>
                            </tr>
                        </thead>
                        <tbody id="vform">
                            <tr>
                                @include('layouts._includes.form.deleterow')
                                <td><input type="text" name="kd_rek_kelompok[]" id="kd_rek_kelompok" class="form-control r-0 s-12" autocomplete="off" value="{{ $tmrekening_akun->kd_rek_akun }}" required/></td>
                                <td><input type="text" name="nm_rek_kelompok[]" class="form-control r-0 s-12" autocomplete="off" required/></td>
                                <td><input type="text" name="kd_rek_aset[]" class="form-control r-0 s-12" autocomplete="off"/></td>
                                <td><input type="text" name="kd_rek_akrual[]" class="form-control r-0 s-12" autocomplete="off"/></td>
                                <td><input type="text" name="kd_rek_utang[]" class="form-control r-0 s-12" autocomplete="off"/></td>
                            </tr>
                        <tbody>
                    </table>
                    <a class="btn btn-outline-secondary btn-sm" title="Tambah baris" onclick="javascript:add_form()"><i class="icon-add"></i> Tambah Baris</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    @include('layouts._includes.form.js_deleterow')

    function add(){
        $('#form').trigger('reset');
        $('#kd_rek_kelompok').focus();
    }
    add();

    function save(){ $('#form').submit(); }
    $('#form').on('submit', function (event) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }else{
            $('#alert').html('');
            $('#btnSave').attr('disabled', true);

            url = "{{ route($route.'store') }}";
            $.post(url, $(this).serialize(), function(data){
                $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                add();
            }, "JSON").fail(function(data){
                err = ''; respon = data.responseJSON;
                $.each(respon.errors, function(index, value){
                    err += "<li>" + value +"</li>";
                });
                $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
            }).always(function(){
                $('#btnSave').removeAttr('disabled');
            });
            return false;
        }
        $(this).addClass('was-validated');
    });
</script>
@endsection