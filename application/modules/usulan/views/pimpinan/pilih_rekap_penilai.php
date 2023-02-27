<!-- modal pilih periode -->
<div class="modal fade" id="modal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Pilih Tahun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>usulan/pimpinan/data_rekap_penilai" method="post">
                    <div class="form-group">
                        <select name="tahun" class="select2 m-b-10 select2-multiple" style="width: 100%" data-placeholder="Click to Choose..." required data-validation-required-message="Data jabatan usulan belum dipilih" required>
                            <option value=""></option>
                            <?php
                            $thn_now = date("Y");
                            for ($i = "2019"; $i <= $thn_now; $i++) {
                            ?>
                                <option value="<?= $i ?>"> <?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Cari">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>