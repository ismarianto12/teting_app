<?php $__env->startSection('title','Kode Rincian Object'); ?>

<?php $__env->startSection('content'); ?>
<div class="page bg-light">
    <?php echo $__env->make('layouts._includes.toolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid my-3">
        <div id="alert"></div>
        <div class="card">
            <div class="card-body">
                <div class="form-row form-inline">
                    <div class="col-md-12">
                        <div class="form-group m-0">
                            <label class="col-form-label s-12 col-md-2"><strong>Kode Rek. Akun :</strong></label>
                            <label class="r-0 s-12 col-md-8 tl"><?php echo e($n_rekening_akun); ?></label>
                        </div>
                        <div class="form-group m-0">
                            <label class="col-form-label s-12 col-md-2"><strong>Kode Rek. Kelompok :</strong></label>
                            <label class="r-0 s-12 col-md-8 tl"><?php echo e($n_rekening_akun_kelompok); ?></label>
                        </div>
                        <div class="form-group m-0">
                            <label class="col-form-label s-12 col-md-2"><strong>Kode Rek. Jenis :</strong></label>
                            <label class="r-0 s-12 col-md-8 tl"><?php echo e($n_rekening_akun_kelompok_jenis); ?></label>
                        </div>
                        <div class="form-group m-0">
                            <label class="col-form-label s-12 col-md-2"><strong>Kode Rek. Obj :</strong></label>
                            <label class="r-0 s-12 col-md-8 tl"><?php echo e($n_rekening_akun_kelompok_jenis_objek); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body no-b">
                <form class="needs-validation" id="form" method="POST" novalidate>
                    <?php echo e(method_field('POST')); ?>

                    <input type="hidden" name="tmrekening_akun_kelompok_jenis_objek_id"
                        value="<?php echo e($tmrekening_akun_kelompok_jenis_objek_id); ?>" />
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Kode Rek. Rincian Obj ( <span class="text-danger">*</span> )</th>
                                <th>Nama Rek. Rincian Obj ( <span class="text-danger">*</span> )</th>

                            </tr>
                        </thead>
                        <tbody id="vform">
                            <tr>
                                <?php echo $__env->make('layouts._includes.form.deleterow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <td><input type="text" name="kd_rek_rincian_obj[]" class="form-control r-0 s-12"
                                        autocomplete="off" value="<?php echo e($kd_awal); ?>" /></td>
                                <td><input type="text" name="nm_rek_rincian_obj[]" class="form-control r-0 s-12"
                                        autocomplete="off" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-outline-secondary btn-sm" title="Tambah baris" onclick="javascript:add_form()"><i
                            class="icon-add"></i> Tambah Baris</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    <?php echo $__env->make('layouts._includes.form.js_deleterow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    function add(){
        $('#form').trigger('reset');
        $('#kd_fungsi').focus();
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

            url = "<?php echo e(route('rekening.koderincianobjek.store')); ?>";
            $.post(url, $(this).serialize(), function(data){
                $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                add();
            }, "JSON").fail(function(data){
                err = ''; respon = data.responseJSON;
                $.each(respon.errors, function(index, value){
                    err += "<li>" + value +"</li>";
                });
                $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Perahtian donk!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
            }).always(function(){
                $('#btnSave').removeAttr('disabled');
            });
            return false;
        }
        $(this).addClass('was-validated');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp64\www\retribusi\resources\views/koderincianobjek/form_add.blade.php ENDPATH**/ ?>