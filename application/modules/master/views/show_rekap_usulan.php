<?php
error_reporting(0);
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Rekapitulasi Usulan JAD</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Rekapitulasi Usulan JAD</a></li>

            </ol>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php //echo $judul; ?></h4>
                <h6 class="card-subtitle"><?php //echo $data_dasar->nip; ?> </code></h6>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" id="nav_dasar" href="#dasar"
                            role="tab"><span class="hidden-sm-up"><i class="ti-menu"></i></span> <span
                                class="hidden-xs-down">Rekapitulasi JAD</span></a> </li>


                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <?php //$no_usulan=$data_dasar->no ; ?>

                    <div class="tab-pane active p-20" id="dasar" role="tabpanel">

                        <div class="card">

                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Rekapitulasi Usulan JAD </h4>
                            </div>
                            <div class="card-body">
                                <!-- <h6 class="card-subtitle"> Detail Dosen </h6>-->
                                <form method="post" action="<?= base_url() ?>master/master/get_excel" role="form"
                                    enctype="multipart/form-data">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Mulai
                                            Tanggal*</label>
                                        <div class="col-10">
                                            <input type="text" name="tgl_mulai" class="form-control"
                                                id="datepicker-autoclose" data-date-format="yyyy-mm-dd"
                                                placeholder="yyyy-mm-dd" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Sampai
                                            Tanggal*</label>
                                        <div class="col-10">
                                            <input type="text" name="tgl_akhir" class="form-control"
                                                id="datepicker-autoclose2" data-date-format="yyyy-mm-dd"
                                                placeholder="yyyy-mm-dd" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Status*</label>
                                        <div class="col-10">
                                            <select class="select2 form-control custom-select" name='status'
                                                style="width: 100%; height:36px;">
                                                <option value="1">Usulan Masuk (Belum Dinilai)</option>
                                                <option value="2">Usulan Yang Sudah Dinilai</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="card-body">

                                        <button type="submit" class="btn btn-primary">Show</button>
                                        <a href="<?php echo base_url('kepegawaian/kepegawaian/' . $status_id); ?>"
                                            class="btn btn-success">Kembali</a>
                                    </div>
                                </form>

                            </div>
                        </div>





                    </div>
                    <div class="tab-pane  p-20" id="dasar2" role="tabpanel">
                        <div class="card">

                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Rekapitulasi Usulan Detail </h4>
                            </div>
                            <div class="card-body">
                                <!-- <h6 class="card-subtitle"> Detail Dosen </h6>-->
                                <form method="post"
                                    action="<?= base_url() ?>kepegawaian/kepegawaian/updatePenilai/<?php echo $no_usulan; ?>"
                                    role="form" enctype="multipart/form-data">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Mulai
                                            Tanggal*</label>
                                        <div class="col-10">
                                            <input type="text" name="tgl_mulai" class="date-picker"
                                                id="datepicker-autoclose" placeholder="mm/dd/yyyy" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Sampai
                                            Tanggal*</label>
                                        <div class="col-10">
                                            <input type="text" name="tgl_akhir" class="form-control"
                                                id="datepicker-autoclose2" placeholder="mm/dd/yyyy" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Instansi*</label>
                                        <div class="col-10">
                                            <select class="select2 form-control custom-select" name='instansi'
                                                style="width: 100%; height:36px;">
                                                <option value="0">Semua</option>
                                                <?php
                                    foreach ($list_instansi as $rowx) {

                                        echo '<option value="' . $rowx->kode . '">' . $rowx->kode . ' ' . $rowx->nama_instansi . '</option>';

                                    }
                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Status*</label>
                                        <div class="col-10">
                                            <select class="select2 form-control custom-select" name='status'
                                                style="width: 100%; height:36px;">
                                                <option value="0">Semua</option>
                                                <?php
                                    foreach ($list_status as $row) {

                                        echo '<option value="' . $row->id . '">' . $row->nama_status . '</option>';

                                    }
                                    ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <button type="submit" class="btn btn-primary">Show</button>
                                        <a href="<?php echo base_url('kepegawaian/kepegawaian/' . $status_id); ?>"
                                            class="btn btn-success">Kembali</a>
                                    </div>
                                </form>

                            </div>
                        </div>




                    </div>
                    <div class="tab-pane p-20" id="riwayat" role="tabpanel"></div>
                    <div class="tab-pane p-20" id="bidang_A" role="tabpanel"></div>
                    <div class="tab-pane  p-20" id="bidang_B" role="tabpanel"></div>
                    <div class="tab-pane p-20" id="bidang_C" role="tabpanel"></div>
                    <div class="tab-pane p-20" id="bidang_D" role="tabpanel"></div>
                    <div class="tab-pane  p-20" id="ceklist" role="tabpanel"> </div>
                    <div class="tab-pane p-20" id="resume" role="tabpanel"></div>
                    <div class="tab-pane p-20" id="pak" role="tabpanel"></div>
                    <div class="tab-pane  p-20" id="log" role="tabpanel"></div>

                </div>
            </div>
        </div>

    </div>

</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script
    src="<?= base_url() ?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
</script>
<script src="<?= base_url() ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script>
jQuery('#datepicker-autoclose').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
});
jQuery('#datepicker-autoclose2').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
});
jQuery('#datepicker-autoclose3').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
});
jQuery('#datepicker-autoclose4').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
});
</script>
<script>
modal.on('shown.bs.modal', function() {
    modal.find('select.select2').select2({
        placeholder: "Select",
        width: 'auto',
        allowClear: true
    });
});
</script>
<script>
function cekSubmitAddPenilai() {
    var r = confirm('Update tim penilai?');
    if (r) {
        $('button[type=submit], input[type=submit]').prop('disabled', true);
        return true;
    } else {
        return false;
    }
}
</script>