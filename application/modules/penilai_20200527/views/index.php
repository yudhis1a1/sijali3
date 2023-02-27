<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url()?>assets/images/logo-lldikti-icon.png">
    <title>SIJALI 3</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url()?>assets/dist/css/tables.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/dist/css/tables2.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- page CSS -->
    <link href="<?= base_url()?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>assets/dist/css/pages/pricing-page.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
  
    <link href="<?= base_url()?>assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
  <link href="<?php echo base_url(); ?>assets/node_modules/wizard/steps.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/dist/css/pages/tab-page.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/js/sweetalert2.min.css" rel="stylesheet">

  <!--<style>
  .big-box h2 {
    text-align: center;
    width: 100%;
    font-size: 1.8em;
    letter-spacing: 2px;
    font-weight: 700;
    text-transform: uppercase;
    cursor:pointer;
}
.modal-dialog {
    width: 100%;
    height: 100%;
    padding: 0;
    /* margin-left: 500px; */
}
.modal-content {
    height: 100%;
    border-radius: 0;
    color:#333;
    overflow:auto;
}
.modal-title {
    font-size: 3em;
    font-weight: 300;
    margin: 0 0 10px 0;
}
.close {
    color:black ! important;
    opacity:1.0;
}
  </style>
  -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIL@T</p>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>usulan">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url()?>assets/images/logo-lldikti-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url()?>assets/images/logo-lldikti-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="<?= base_url()?>assets/images/lldikti-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="<?= base_url()?>assets/images/lldikti-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    
					<ul class="navbar-nav mr-auto">
                        <li class="nav-item"> 
							<a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)">
								<i class="ti-menu"></i>
							</a> 
						</li>
                        <li class="nav-item"> 
							<a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)">
								<i class="icon-menu"></i>
							</a> 
						</li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
						<li class="nav-item dropdown u-pro">
                        
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url()?>assets/images/user1.png" alt="user" class=""> <span class="hidden-md-down"><?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <!--<a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Profil Ku</a>-->
                                <!-- text-->
                                <a href="<?php echo base_url(); ?>usulan/usulan/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Keluar</a>
                                <!-- text-->
                            </div>
                        </li>
					</ul>
					<!-- ============================================================== -->
					<!-- End User Profile -->
					<!-- ============================================================== -->
                    
                </div>
            </nav>
        </header>
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <!-- <ul class="m-t-20 chatonline">
                
    </ul> -->
                    <ul id="sidebarnav">
                    <li> 
                        <!-- <a class="waves-effect waves-dark" href="#" aria-expanded="false"><img src="<?= base_url()?>assets/images/logo.png" alt="user-img" width="300px" class="img-circle">Admin</a> -->
                    
                    <a href="javascript:void(0)" class="m-t-20 chatonline"><img src="<?= base_url()?>assets/images/logo.png" alt="user-img" class="img-circle"> <span><?= $this->session->userdata('nama') ?><br><small class="text-success">online</small></span></a>
                        </li>
					<?php $this->load->view('menuutama')?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <div class="container-fluid">
        <div class="row page-titles">
            <div class="alert alert-info col-md-12">
                <?php 
                $no= $this->uri->segment(4);
                $cek_usulans=$this->db->query("SELECT * from v_usulans where no='$no'")->row(); 
                if($cek_usulans<1)
                {
					$nox= $this->uri->segment(5);
                }else{
					$nox= $this->uri->segment(4);	
                }
                
                $v_usulans=$this->db->query("SELECT * from v_usulans where no='$nox'")->row(); 
                $jenjang=$this->db->query("SELECT nama_jenjang from jenjangs where id='$v_usulans->jenjang_id'")->row();
                $jenjang_baru=$this->db->query("SELECT nama_jenjang from jenjangs where id='$v_usulans->jenjang_id_baru'")->row();
                $cek_jab=$this->db->query("SELECT
											  jabatan_akhir_no,
											  jabatan_usulan_no
											FROM
											  jabatan_syarats
											WHERE jabatan_akhir_no = '$v_usulans->jabatan_akhir_no'
											  AND jabatan_usulan_no = '$v_usulans->jabatan_usulan_no'")->row(); 
                $awal_jab=$this->db->query("SELECT
											  c.`nama_jabatans`,
											  c.kum
											FROM
											  `jabatan_syarats` a
											  JOIN `jabatan_jenjangs` b
												ON a.`jabatan_akhir_no` = b.`no`
											  JOIN `jabatans` c
												ON b.`jabatan_kode` = c.`kode`
											WHERE a.`jabatan_akhir_no` = '$cek_jab->jabatan_akhir_no'")->row(); 
                $usul_jab=$this->db->query("SELECT
											  c.`nama_jabatans`,
											  c.kum
											FROM
											  `jabatan_syarats` a
											  JOIN `jabatan_jenjangs` b
												ON a.`jabatan_usulan_no` = b.`no`
											  JOIN `jabatans` c
												ON b.`jabatan_kode` = c.`kode`
											WHERE a.`jabatan_usulan_no` = '$cek_jab->jabatan_usulan_no'")->row(); 
				$bid_ilmu_usul=$this->db->query("SELECT
												  a.`id_rwy_didik_formal`,
												  a.`id_sdm`,
												  a.`nm_sp_formal`,
												  a.`thn_lulus`,
												  a.`tgl_lulus`,
												  a.`id_jenj_didik`,
												  b.`nama_jenjang`,
												  a.`id_bid_studi`,
												  c.`nama_bidang`
												FROM
												  `rwy_pend_formal` a
												  LEFT JOIN `jenjangs` b
													ON a.`id_jenj_didik` = b.`id`
												  JOIN `bidang_ilmus` AS c
													ON a.`id_bid_studi` = c.`kode`
												WHERE a.`id_sdm` = '$v_usulans->dosen_no'
												ORDER BY a.`id_jenj_didik` DESC
												LIMIT 1")->row();
                ?>
               <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Information</h3> 
               <div class="form-group m-t-40 row">
                   <div class="col-2">   
                  </div>
                    <div class="col-3">
                      <label for="berkas">NIDN/NIDK</label>
                     <input class="form-control" type="text"  id="nidn" value="<?php echo "$v_usulans->nidn /$v_usulans->nidk"; ?>" readonly>
                  </div>
                    <div class="col-4">
                      <label for="berkas">NAMA</label>
                     <?php if(!empty($v_usulans->gelar_depan)){ ?>
						<input class="form-control" type="text"  id="nama" value=" <?php echo $v_usulans->gelar_depan; ?>.<?php echo $v_usulans->nama; ?>, <?php echo $v_usulans->gelar_belakang; ?> " readonly>
					 <?php } else { ?>
						<input class="form-control" type="text"  id="nama" value=" <?php echo $v_usulans->nama; ?>, <?php echo $v_usulans->gelar_belakang; ?> " readonly>
					 <?php }?>
                  </div>
                    <div class="col-2">   
                  </div>
                  
                </div>
                <div class="form-group m-t-40 row">
                    <div class="col-3">
                      <label for="berkas">JABATAN AWAL</label>
                      <input class="form-control" type="text"  id="nidn" value="<?php echo "$awal_jab->nama_jabatans"; ?> (<?php echo $awal_jab->kum; ?>)" readonly>
                  </div>
                    <div class="col-3">
                      <label for="berkas">Pendidikan Pada Jab.terakhir</label>
                      <input class="form-control" type="text"  id="nama" value=" <?php echo $jenjang->nama_jenjang; ?>" readonly>
                  </div>
                  <div class="col-3">
                      <label for="berkas">Usulan Jabatan</label>
                      <input class="form-control" type="text"  id="nama" value=" <?php echo $usul_jab->nama_jabatans; ?> (<?php echo $usul_jab->kum; ?>)" readonly>
                  </div>
                  <div class="col-3">
                      <label for="berkas">Pend. & Bid. Ilmu Usulan Jabatan</label>
                      <input class="form-control" type="text"  id="nama" value=" <?php echo $jenjang_baru->nama_jenjang; ?>, <?php echo $bid_ilmu_usul->nama_bidang; ?>" readonly>
                  </div>
                </div>
            </div>
        </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <?php $this->load->view($view)?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
		<?php $this->load->view('footer')?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url()?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?= base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url()?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url()?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url()?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url()?>assets/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?= base_url()?>assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?= base_url()?>assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?= base_url()?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="<?= base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url()?>assets/dist/js/dashboard1.js"></script>
    <script src="<?= base_url()?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?= base_url()?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url()?>assets/js/myjs.js"></script> -->
    <script type="text/javascript" src="<?= base_url()?>node_modules/moment/moment.js"></script>
    <!-- DATETIMEPICKER JS -->
	<script src="assets/dist/js/moment-with-locales.js"></script>
	<script src="assets/dist/js/bootstrap-datetimepicker.js"></script>
<!-- JS Step -->
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/steps2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	
	<!-- validation -->
	<script src="<?= base_url()?>assets/dist/js/pages/validation.js"></script>
	
	 <!--stickey kit -->
    <script src="<?= base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    
	
    <!-- <script type="text/javascript">
      $('.nav-link').on('click', function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
      });
    

  </script> -->
  </body>
<!-- Penutup JS Step -->

	<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
	
    <script>
    $(document).ready(function() {
        // $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <script>
    jQuery(document).ready(function() {
        // Switchery
        
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
       
   
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
    
<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			var txt
			
			var usulan_no_details = $("#no_usulan_detail").val();
			var next_usulan = usulan_no_details+nextform;
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<h4>Data Mata Kuliah ke " + nextform + " :</h4>" +
				"<table id='table-data' class='ui celled table'>" +
				"<tr>" +
				"<td>Matakuliah</td>" +
				"<td><input type='text' name='uraian[]'><input type='hidden' name='no_usulan_detail[]' value='" + next_usulan + "'></td>" +
				"<td>Satuan Hasil</td>" +
				"<td><input type='text' name='satuan_hasil[]' size='10' required></td>" +
				"</tr>" +
				"<tr>" +
				"<td>SKS/mtk</td>" +
				"<td><input type='number' id='txt4'  onkeyup='sum()' name='sks[]' required></td>" +
				"<td>Volume</td>" +
				"<td><input type='number' id='txt5'  onkeyup='sum()' name='jumlah_volume[]' size='10'  required></td>" +
				"</tr>" +
				"</table>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
    <script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn_tambah_form_mhs").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			var txt
			
			var usulan_no_details = $("#no_usulan_detail").val();
			var next_usulan = usulan_no_details+nextform;
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert_form_mhs").append("<h4>Data Mahasiswa ke " + nextform + " :</h4>" +
				"<table id='table-data' class='ui celled table'>" +
				"<tr>" +
				"<td>NIM : </td>" +
				"<td><input type='number' name='nim[]' style='width:300px;'></td>" +
				"</tr>" +
				"<tr>" +
				"<td>Nama Mahasiswa : </td>" +
				"<td><input type='text' name='mhs[]' style='width:500px;'><input type='hidden' name='no_usulan_detail[]' value='" + next_usulan + "'></td>" +
				"</tr>" +
				"</table>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn_reset_form_mhs").click(function(){
			$("#insert_form_mhs").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
    
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn_tambah_form_keg").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			var txt
			
			var usulan_no_details = $("#no_usulan_detail").val();
			var next_usulan = usulan_no_details+nextform;
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert_form_keg").append("<h4>Data Kegiatan ke " + nextform + " :</h4>" +
				"<div class='row'>"+
				"<div class='col-md-12'>"+
					"<div class='form-group'>"+
					"<label for='keterangan'>Uraian Kegiatan</label>"+
					"<textarea name='uraian[]' class='form-control' rows='2' maxlength='255'></textarea>"+
					"<input type='hidden' name='no_usulan_detail[]' id='no_usulan_detail' value='" + next_usulan + "'>"+
					"</div>"+
                "</div>"+
				"</div>");
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn_reset_form_keg").click(function(){
			$("#insert_form_keg").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
    <script>
  $('#uploadModal').on('show.bs.modal', function (e) {
      if (e.namespace === 'bs.modal') {
          var nama = $(e.relatedTarget).data('nama');
          var judul = $(e.relatedTarget).data('judul');

          $(e.currentTarget).find('#modalLabel').html(judul);
          $(e.currentTarget).find('input[name="jenis"]').val(nama);
      }
  });

  function cekSubmit(){
        var r = confirm('Upload berkas?');
        if(r){
            $('button[type=submit], input[type=submit]').prop('disabled',true);
            return true;
        } else {
            return false;   
        }
    }
</script>




</body>

</html>