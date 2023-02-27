<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">USULAN JAD</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <a href="<?php echo base_url(); ?>usulan/usulan/pilih" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center" ><i class="fa fa-eye"></i></th>
                                            <th>Status Usulan</th>                                       
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Nama Instansi</th>
                                            <th>Prodi</th>
                                            <th>JAD Usulan</th>
                                            <th>Updated</th> 
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            <?php
                                           // $query=$this->db->query('Select * from dosens order by nidn');

                                                foreach ($dosen as $row)
                                                {
                                               
                                                ?>
                                            <tr>
                                                <td >
                                                <a href="<?= base_url(); ?>usulan/usulan/usulans/usul/<?php echo $row->no ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
                                
                                                <!--<a href="<?= base_url(); ?>usulan/usulan/usulans/edit/<?php echo $row->no ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square"></i></a>
                                                
                                                <a href="<?= base_url(); ?>usulan/usulan/hapus_usulan/<?php echo $row->no ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash-o"></i></a>
                                                -->
                                                </td>
                                                <td><h3><center><span class="label label-danger"><?php echo $row->nama_status ?></span></center></h3></td>
                                                <td><?php echo $row->no ?></td>
                                                <td><?php echo $row->nidn ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->nama_instansi ?></td>
                                                <td><?php echo $row->nama_prodi ?></td>
                                                <td><?php echo $row->nama_jabatans ?>-<?php echo $row->kum ?>(<?php echo $row->nama_jenjang ?>)</td>
                                                <td><?php echo $row->updated_at ?></td>
                                                
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


                        
