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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logo-lldikti-icon.png">
    <title>SIJALI 3</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url() ?>assets/dist/css/tables.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dist/css/tables2.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- page CSS -->
    <link href="<?= base_url() ?>assets/dist/css/pages/progressbar-page.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/dist/css/pages/pricing-page.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
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
                            <img src="<?= base_url() ?>assets/images/logo-lldikti-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url() ?>assets/images/logo-lldikti-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="<?= base_url() ?>assets/images/lldikti-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url() ?>assets/images/lldikti-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/images/user1.png" alt="user" class=""> <span class="hidden-md-down"><?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <!--<a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Profil Ku</a>-->
                                <!-- text-->
                                <a href="<?php echo base_url(); ?>usulan/usulan/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Keluar</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#formModal"><i class="fa fa-key"></i> Ganti Password</a>
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
                            <!-- <a class="waves-effect waves-dark" href="#" aria-expanded="false"><img src="<?= base_url() ?>assets/images/logo.png" alt="user-img" width="300px" class="img-circle">Admin</a> -->

                            <a href="javascript:void(0)" class="m-t-20 chatonline"><img src="<?= base_url() ?>assets/images/logo.png" alt="user-img" class="img-circle"> <span><?= $this->session->userdata('nama') ?><br><small class="text-success">online</small></span></a>
                        </li>
                        <?php $this->load->view('menuutama') ?>
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
                <div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <?php $this->load->view($view) ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            <?php $this->load->view('footer') ?>
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
    <script src="<?= base_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url() ?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?= base_url() ?>assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="<?= base_url() ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?= base_url() ?>assets/dist/js/dashboard1.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>assets/js/myjs.js"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>node_modules/moment/moment.js"></script>
    <!-- DATETIMEPICKER JS -->
    <!-- <script src="assets/dist/js/moment-with-locales.js"></script>
	<script src="assets/dist/js/bootstrap-datetimepicker.js"></script> -->
    <!-- JS Step -->
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>assets/node_modules/wizard/steps.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <!-- validation -->
    <script src="<?= base_url() ?>assets/dist/js/pages/validation.js"></script>

    <!--stickey kit -->
    <script src="<?= base_url() ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>


    <!--script timline log-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/node_modules/timeline/css/timeline.min.css">
    <script src="<?= base_url() ?>assets/node_modules/timeline/js/timeline.min.js"></script>

    <!-- <script type="text/javascript">
      $('.nav-link').on('click', function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
      });
    

  </script> -->
</body>
<!-- Penutup JS Step -->

<script>
    $('#myModal').modal('show');
    $(document).ready(function() {
        jQuery('.timeline').timeline();
    });
</script>

<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
</script>

<script>
    $(document).ready(function() {
        $("#myTablesya").DataTable({
            dom: 'Blfrtip',
            lengthMenu: [
                [10, 25, 50, 10000],
                ['10', '25', '50', 'Show All']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo base_url('superadmin/superadmin/tampil_all_user') ?>",
                type: 'POST',
            }
        });

        $("#log_usulans").DataTable({
            dom: 'Blfrtip',
            lengthMenu: [
                [10, 25, 50, 10000],
                ['10', '25', '50', 'Show All']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo base_url('superadmin/superadmin/tampil_log_usulans') ?>",
                type: 'POST',
            }
        });

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


    $('#myTablePTK').DataTable({

        dom: 'Blfrtip',
        lengthMenu: [
            [10, 25, 50, 10000],
            ['10', '25', '50', 'Show All']
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?php echo base_url('ketenagaan/ketenagaan/usulan/' . $filter) ?>",
            type: 'POST',
        }
    });

    $('#myTablePTK2').DataTable({

        dom: 'Blfrtip',
        lengthMenu: [
            [10, 25, 50, 10000],
            ['10', '25', '50', 'Show All']
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?php echo base_url('ketenagaan/ketenagaan/usulan2/' . $filter) ?>",
            type: 'POST',

            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData[12]) {
                    $('td', nRow).css('background-color', 'Red');
                }
            },
        }
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
    $('#uploadModal').on('show.bs.modal', function(e) {
        if (e.namespace === 'bs.modal') {
            var nama = $(e.relatedTarget).data('nama');
            var judul = $(e.relatedTarget).data('judul');

            $(e.currentTarget).find('#modalLabel').html(judul);
            $(e.currentTarget).find('input[name="jenis"]').val(nama);
        }
    });

    function cekSubmit() {
        var r = confirm('Upload berkas?');
        if (r) {
            $('button[type=submit], input[type=submit]').prop('disabled', true);
            return true;
        } else {
            return false;
        }
    }
</script>
</body>

</html>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url() . 'usulan/usulan/ganti_password' ?>" method="post">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input class="form-control" type="password" name="pass_baru" required>
                    </div>

                    <div class="form-group">
                        <label> Ulangi Password Baru</label>
                        <input class="form-control" type="password" name="ulang_pass" required>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>