
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Ketenagaan</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Ketenagaan</a></li>
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
                                    <table id="myTableHKT" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th class="text-center" width="50px"><i class="fa  fa icon-screen-desktop  "></i></th> 
                                            <th>Resume</th>                                           
                                          
                                            <th>NIDN/NIDK</th>
                                            <th>Nama</th>
                                            <th>Homebase</th>
                                            <th>Prodi</th>
                                            <th>JAD Usulan</th>
                                            <th>Status Usulan</th>
                                            <th>Tim Penilai</th>
											 <th>Status Penilaian</th>
                                            <th>PIC PTK</th>
											<th>Diperiksa Oleh</th>
                                            <th>Tanggal Pengusulan Ke LLDIKTI</th>
											<th>Tanggal TMT PAK</th>
											<th>Tanggal TMT SK</th>
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



          <!--       <script>
               
                $("#myTable").DataTable({
                    //pageLength : 10,
                    
                    order: [[ 9, 'desc' ]],
                    processing: true,
                    serverSide: true,
                    ajax: {
                    url: "<?php echo base_url('kepegawaian/kepegawaian/usulan/'.$filter) ?>",
                    type:'POST',
                    }
                });
				</script> -->
 

						