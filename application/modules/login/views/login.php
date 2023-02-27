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

    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png"> -->
    <title>SIJALI LLDIKTI III</title>

    <!-- page css -->
    <link href="<?php echo base_url(); ?>assets/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/style.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="horizontal-nav skin-megna card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIJALI LLDIKTI III</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register2.jpg);">
            <div class="login-box card">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert alert-danger alert-primary alert-dismissible fade show' role='alert'>";
                        echo $this->session->flashdata('alert') . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button>
                      </div>";
                    } else if ($_GET['pesan'] == "logout") {

                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                        echo "Anda Telah Logout";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                          </div>";
                    } else if ($_GET['pesan'] == "error") {

                        // echo "<div class='alert alert-danger' style='margin-top: 3px'>
                        // <div class='header'><b><i class='fa fa-exclamation-circle'></i> ERROR</b> username atau password salah!</div></div>";
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                        echo "<b><i class='fa fa-exclamation-circle'></i> ERROR</b> username atau password salah!";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                          </div>";
                    } else if ($_GET['pesan'] == "belumlogin") {
                        if ($this->session->flashdata()) {
                            // echo "<div class='alert alert-danger alert-primary alert-dismissible fade show' role='alert'>";
                            // echo $this->session->flashdata('Silahkan login dulu');
                            // echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            //    <span aria-hidden='true'>&times;</span>
                            //    </button>
                            //    </div>";
                        }
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
                        echo "Silahkan Login Dulu!!!";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button>
                      </div>";
                    }
                } else {
                    if ($this->session->flashdata()) {
                        echo "<div class='alert alert-danger alert-primary alert-dismissible fade show' role='alert'>";
                        echo $this->session->flashdata('alert');
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button>
                      </div>";
                    }
                }
                ?>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url() . 'login/login' ?>">
                        <div class=" box-title text-center m-b-20">
                            <img src="../assets/images/sijali_hebat.png" height="125" width="266">
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" placeholder="Username">
                                <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Masuk</button>
                                <br>
                                <a class="btn btn-outline-success" aria-expanded="false" aria-controls="collapseExample" href="../assets/Panduan_SIJALI3_Versi1.pdf" target="_blank"><i class="fa fa-cloud-download"></i> Download Panduan</a>
                            </div>
                        </div>
                        <div class="row">


                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

</body>

</html>