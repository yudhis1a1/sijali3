 <div class="row page-titles">
     <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor"></h4>
     </div>
     <!--<div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> </button>
                        </div>
                    </div>
					-->
 </div>
 <!-- ============================================================== -->
 <!-- End Bread crumb and right sidebar toggle -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- Start Page Content -->
 <!-- ============================================================== -->
 <div class="row">
     <div class="col-12">
         <?php if ($role == "9") {
                include "pimpinan/beranda_pimpinan.php";
            } elseif ($role == "6") {
                include "beranda_subptk.php";
            } else { ?>
             <div class="card">
                 <div class="card-body">
                     Selamat Datang di SIJALI3 <br><b class='text-danger'><?= $this->session->userdata('nama'); ?></b>
                 </div>
             </div>

             <div class="card">
                 <div class="card-body">
                     Informasi Terbaru: <br><b class='text-danger'><?php echo $judul; ?></b><br><?php echo $isi; ?>
                 </div>
             </div>
         <?php } ?>

         <!-- sample modal content -->
         <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Update Berita Beranda</h4>

                     </div>
                     <div class="modal-body">
                         <?php echo form_open_multipart('usulan/usulan/updateberitaberanda/'); ?>


                         <div class="form-group">
                             <label for="recipient-name" class="control-label">Judul Berita:</label>
                             <input type="text" class="form-control" name="xjud" value="<?php echo $judul; ?>">
                             <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                         </div>
                         <div class="form-group">
                             <label for="message-text" class="control-label">Isi Berita:</label>
                             <textarea class="form-control" name="xisi"><?php echo $isi; ?></textarea>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                         <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Perubahan</button>
                     </div>
                     <?php
                        // echo $prodi;
                        echo form_close();
                        ?>
                 </div>
             </div>
         </div>
         <!-- /.modal -->

     </div>


 </div>