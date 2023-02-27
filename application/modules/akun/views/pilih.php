<style type="text/css">
        .gambar{
	height: 200px;
	width: 230px;
    
}
.gambar2{
	height: 200px;
	width: 300px;
    
}
    </style>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted m-t-0"></p>
                        <div id="code1" class="collapse">
                            <div class="highlight">
                                <pre>
    <code><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span> <span class="na">style=</span><span class="s">"width: 20rem;"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;img</span> <span class="na">class=</span><span class="s">"card-img-top"</span> <span class="na">src=</span><span class="s">"..."</span> <span class="na">alt=</span><span class="s">"Card image cap"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
        <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.<span class="nt">&lt;/p&gt;</span>
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Daftar<span class="nt">&lt;/a&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code>
</pre>
                            </div>
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <!-- column -->
                            <?php if($username=='0' || $role=='4') { ?>
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                               
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="gambar" src="<?= base_url()?>assets/images/big/dosen.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">DOSEN</h4>
                                        <form action="<?= base_url(); ?>akun/akun/daftar_user" method="post">
                                        <input type="hidden" name="no" value="1">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-t-20" >Pilih</button>
                                        </form > 
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="gambar" src="<?= base_url()?>assets/images/big/operator-pt.png" alt="Sub Operator PT" >
                                    <div class="card-body">
                                        <h4 class="card-title">SUB OPERATOR PT</h4>
                                        <form action="<?= base_url(); ?>akun/akun/daftar_user" method="post">
                                        <input type="hidden" name="no" value="2">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-t-20">Pilih</button> 
                                        </form >
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6 img-responsive">
                                <!-- Card -->
                                
                                <!-- Card -->
                            </div>
                            <?php }else{ ?>
                                <div class="col-lg-4 col-md-6">
                                <!-- Card -->
                               
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-4 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="gambar2" src="<?= base_url()?>assets/images/big/dosen.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">DOSEN</h4>
                                        <form action="<?= base_url(); ?>akun/akun/daftar_user" method="post">
                                        <input type="hidden" name="no" value="1">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-t-20" >Pilih</button>
                                        </form > 
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-4 col-md-6">
                                <!-- Card -->
                                
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            
                                <?php } ?>
                            <!-- column -->
                        </div>
                        <!-- Row -->
                    </div>
                </div>
