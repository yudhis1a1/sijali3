
                <?php
error_reporting(0);
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                         <h4 class="text-themecolor">Usulan JAD : 
						<?php
						if($usulan_status_id =='1')
						{
							echo "Draft";
						}elseif($usulan_status_id =='2')
						{
							echo "Draft Revisi";
						}elseif($usulan_status_id =='3')
						{
							echo "Usulan Baru";
						}elseif($usulan_status_id =='4')
						{
							echo "Proses Approval Tim Penilai";
						}elseif($usulan_status_id =='5')
						{
							echo "Proses Penilaian";
						}elseif($usulan_status_id =='6')
						{
							echo "Proses Operator Ketenagaan";
						}elseif($usulan_status_id =='7')
						{
							echo "Proses Dikti";
						}elseif($usulan_status_id =='8')
						{
							echo "Proses Operator Kepegawaian";
						}else
						{
							echo "Selesai";
						}
						?>
                    </div>
                </div>
					
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $judul; ?></h4>
                                <h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/view/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no; ?>
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

            <div class="card">
            <div class="card-body">                              
                                 <div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
										<tr>
										  <th colspan="2">
											<h2>Matakuliah</h2>
										  </th>
										  <th>
										  <center>
										   <?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
										   <button type="button" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i>Tambah Matkul</button>
										   <?php } ?>
										   </center>
										  </th>
										</tr>
										<tr>
											<th>No</th>
											<th>Nama Mata Kuliah</th>                                                
											<th><center>AKSI</center></th>          
										</tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($data_mtk as $mtk){
                                            $i= $i + 1;
                                            ?>
                                     <tr>
                                        <td >
                                           <?php echo $i ;?>
                                        </td>
                                        <td>
                                        <?php echo $mtk->nama;?>
                                        </td>
                                        <td>
										<center>
											<?php if($mtk->berkas == ''){}else{ ?>
											<a href="<?= base_url()?>assets/download_matkul/<?php echo $mtk->berkas;?>" target="_blank" class="btn btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
											<?php 
											}
											if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
											<a href="<?= base_url(); ?>usulan/usulan/hapus_matkul/<?php echo $mtk->no; ?>/<?php echo $mtk->usulan_no; ?>/<?php echo $mtk->berkas;?>" class="btn btn-danger waves-effect waves-light m-t-20 tombol-hapus"><i class="fa fa-trash-o"></i></a>
											<?php } ?>
										</center>
                                        </td>
                                        </tr>
                                        <?php }; ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>                            
                                   
                                    </div>                             
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Matkul:</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url()?>usulan/usulan/tambah_matkul/<?php echo $no; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Matakuliah</label>
                                                        <input type="text" name="matkul" class="form-control" required placeholder="Matakuliah">
                                                    </div>
                                                   
                  
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                
        
            
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>