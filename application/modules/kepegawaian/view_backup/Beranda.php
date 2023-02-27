
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Kepegawaian</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Kepegawaian</a></li>
                                <li class="breadcrumb-item active"> <?php echo $judul; ?></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-12">        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo $judul; ?></h4>
                               
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                         <th class="text-center" width="50px"><i class="fa  fa icon-screen-desktop  "></i></th> 
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>NIDK</th>
                                            <th>Nama</th>
                                            <th>Homebase</th>
                                            <th>Prodi</th>
                                            <th>JAD Usulan</th>
                                            <th>Status Usulan</th>
                                            <th>Updated</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
                    </div>
                </div>
                <script src="<?= base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap popper Core JavaScript -->
                <script src="<?= base_url()?>assets/node_modules/popper/popper.min.js"></script>
                <script src="<?= base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="<?= base_url()?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>

                <script>

                $("#myTable").DataTable({
                    ordering: false,
                    processing: true,
                    serverSide: true,
                    ajax: {
                    url: "<?php echo base_url('kepegawaian/kepegawaian/usulan/'.$filter) ?>",
                    type:'POST',
                    }
                });

          
                </script>