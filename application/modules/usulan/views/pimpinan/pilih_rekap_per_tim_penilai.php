<!-- modal pilih periode -->
<div class="modal fade" id="modal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Pilih Tahun & Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>usulan/pimpinan/data_rekap_per_tim_penilai" method="post">
                    <div class="form-group">
                        <label>Pilih Tahun</label>
                        <select name="tahun" class="select2 m-b-10 select2-multiple" style="width: 100%" data-placeholder="Click to Choose..." required data-validation-required-message="Data jabatan usulan belum dipilih" required>
                            <?php
                            $thn_now = date("Y");
                            ?>
                            <option value="all_thn">Semua Tahun</option>
                            <?php
                            for ($i = "2019"; $i <= $thn_now; $i++) {
                            ?>
                                <option value="<?= $i ?>"> <?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Bulan</label>
                        <select name="bulan" class="select2 m-b-10 select2-multiple" style="width: 100%" data-placeholder="Click to Choose..." required data-validation-required-message="Data jabatan usulan belum dipilih" required>
                            <option value="all_bln">Semua Bulan</option>
                            <option value="01"> Januari</option>
                            <option value="02"> Februari</option>
                            <option value="03"> Maret</option>
                            <option value="04"> April</option>
                            <option value="05"> Mei</option>
                            <option value="06"> Juni</option>
                            <option value="07"> Juli</option>
                            <option value="08"> Agustus</option>
                            <option value="09"> September</option>
                            <option value="10"> Oktober</option>
                            <option value="11"> November</option>
                            <option value="12"> Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <center>
                            <input class="btn btn-primary btn-md" type="submit" name="submit" value="Cari">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>