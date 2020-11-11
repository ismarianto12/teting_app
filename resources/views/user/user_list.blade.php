@extends('layouts.template')
@section('title','List Data Pegawai')
@section('content') 

<script>
    $(function(){
    $('#datauser').on('click', '.edit', function() {
        var access = $(this).attr('to');
        $('.show_form').load(access).slideDown();
    });

});  
</script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">User Hak Akses</h2>
                <h5 class="text-white op-7 mb-2">Level </h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">List data hak akses.</a>
                <a href="#" to="{{ route('user.create') }}" class="tambah btn btn-secondary btn-round">Tambah Hak
                    Akses</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">

                <div class="show_form"></div>
                <div class="table-responsive">
                    <table id="datauser" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th>SKPD</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th>SKPD</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($load_script as $script)
@php echo $script @endphp
@endforeach
<script>
    $(document).ready(function () { 
        $('#datauser').DataTable({
            initComplete: function() {
                var api = this.api();
                $('#datatables input')
                .off('.DT')
                .on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ Url('user_datatable') }}",
            },
            columns: [
            {
                data: 'DT_RowIndex',
                orderable:false,
            },
            {
                data : 'username',
            },
            {
                data : 'realname',
            },
            {
                "data" : 'c_status',
                "render": function (data, type, row) {
                    if (row.c_status == 1) {
                        return '<b>Aktif</b>';
                    } else if (row.c_status == 2) {
                        return 'Non Aktif';
                    } 
               },
            },
            {
                data : 'telp',
            },
            {    
                "data": "tmuser_level_id",
                "render": function (data, type, row) {
                if (row.tmuser_level_id == 1) {
                    return 'Administrator';
                } else if (row.tmuser_level_id == 2) {
                    return 'User';
                } else {
                    return 'Satker User';
                }
                }, 
            },
            {
                data : 'nama_satker',
                orderable :false,
            },
            {
                data : 'action',
                orderable :false,
            }
            ],
            'responsive' : true,
        }); 

    });
///section add data
  $(function(){
    $('.tambah').on('click',function(){
        var url = $(this).attr('to');
        $('.show_form').load(url).slideDown(); 
    });  
  });


  $(function(){
    $('#datauser').on('click','.delete',function(){
        var id = $(this).attr('data'); 
        Swal.fire({
            title: 'Data User ini akan di hapus ?',
            text: "Data akan di hapus ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ Url("user/destroy") }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    }, 
                    success: function(data) {
                          Swal.fire(
                             'Deleted!',
                             'Data berhasil di hapus.',
                             'success'
                        ); 
                        $("#datauser").DataTable().ajax.reload(); 
                    },
                    error: function(data) {
                        Swal.fire(
                            'Tidak bisa di hapus!',
                            'Server tidak respon.',
                            'danger'
                        );
                    }
                });
            }
        })


    });
}); 
    
</script>




@endsection