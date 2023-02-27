<?php
error_reporting(0);
?>
 
 <!-- row -->

 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                
                                <?php
                                echo"$pak";
                                
                                ?>
                              
                            
                            </div>
                        </div>
                    </div>
               
                </div>

                <div id="content_surat">   
                
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                               
                                  
                                <div class="row">
              <div class="col-md-12">
                <center>
                <table  class="cust-print-table2 cust-table2-bordered text-center">
                  <tr><th><img src="<?= base_url()?>assets/images/tutwurihandayani.png" height="100px;"><br/><br/></tr></th>
                  <tr><th>KEPUTUSAN MENTERI PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</tr></th>
                 </table 
                </center>
              </div>
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');

				?>       
                     <form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/updatesk/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data">
             
                 <table  class="cust-print-table2 cust-table2-bordered">
                  
                  <col width="30" />
                  <col width="30" />
                  <col width="200" />
                  <col width="120" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />

                  <tbody>
                    <tr class="text-center btop">
                      <td colspan="9"></td>
                    </tr>
                    <tr class="text-center btop">
                      <td colspan="9" class="text-center">
                        NOMOR : <input type="text" name="sk_no"  value="<?=$data_dasar->sk_no?>" style="width: 250px;" minlength="5" required="required"><br/>
                        <input type="hidden" name="no_usulan" value="<?=$data_dasar->usulans_no?> " style="width: 250px;"  required="required">
                        <input type="hidden" name="usulan_status_id" value="<?=$data_dasar->usulan_status_id?> " style="width: 250px;"  required="required">
                   
                        TENTANG<br/>
                        PENGANGKATAN PERTAMA KALI DALAM JABATAN AKADEMIK DOSEN<br/>
                        MENTERI PENDIDIKAN DAN KEBUDAYAAN<br/><br/>
                        
                      </td>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left" style="width: 100px;">Menimbang</th>
                      <th class="text-right" >:</th>
                      <th colspan="4" class="text-justify">
                      <ol type="a">
                      <li>
                      bahwa sebagai pelaksanaan dari Pasal 24 Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 17 Tahun 2013, sebagaimana telah diubah dengan Keputusan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 46 Tahun 2013, perlu untuk mengangkat Saudara  dalam jabatan Akademik Dosen;</li>
                      <li>
                      bahwa pengangkatan tersebut berdasarkan persetujuan dari Koordinator Kopertis Wilayah III Jakarta Nomor <?php echo $data_dasar->tmt_no; ?> tanggal <?php echo $tmt_tgl; ?>
                      </li>
                      <li>
                      surat pengantar Kepala Bagian Sumber Daya Perguruan Tinggi LLDIKTI Wilayah III D.K.I. Jakarta.
                      </li>          
                      </ol>
                      </th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;">Mengingat</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify">
                      <ol type="1">
                      <li>
                      Undang-Undang Nomor 14 Tahun 2005;  </li>
                      <li>
                      Peraturan Pemerintah Nomor 16 Tahun 1994, jo Nomor 40 Tahun 2010; </li>
                      <li>
                      Peraturan Pemerintah Nomor 9 Tahun 2003, jo Nomor 63 Tahun 2009;
                      </li>
                      <li>
                      Peraturan Presiden Nomor 82 Tahun 2019;
                      </li>
                      <li>
                      Keputusan Presiden Nomor 121/P Tahun 2014;
                      </li>
                      <li>
                      Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 17 Tahun 2013, jo Keputusan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 46 Tahun 2013;
                      </li>
                      <li>
                      Peraturan Bersama Menteri Pendidikan dan Kebudayaan dan Kepala Badan Kepegawaian Negara Nomor 4/VIII/PB/2014 dan Nomor 24 Tahun 2014; </li>
                      <li>
                      Peraturan Menteri Pendidikan dan Kebudayaan Nomor 92 Tahun 2014; </li>
                      <li>
                      Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 26 tahun 2015; </li>
                      <li>
                      Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 15 tahun 2018;   </li>
                      <li>
                      Peraturan Menteri Pendidikan dan Kebudayaan Nomor 11 Tahun 2018. </li>
                      </ol>
                      </th>
                    </tr>
                    
                    <tr class="text-center btop">
                      <td colspan="4" class="text-center" style="font-weight: bold;">
                       M E M U T U S K A N
                      </td>
                    </tr>
                    
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;">Menetapkan</th>
                      <th class="text-right">:</th>
                    </tr>

                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;">Pertama</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify">
                      Terhitung mulai tanggal <input type="text" name="sk_tmt" class="form-control" id="datepicker-autoclose2" placeholder="yyyy-mm-dd"  value="<?=$data_dasar->sk_tmt?>" style="width: 250px;" required="required"> mengangkat :<br/>
                      N  a  m  a&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data_dasar->gelar_depan.''.$data_dasar->nama.', '.$data_dasar->gelar_belakang; ?><br/>
                      N I D N&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo ' '.$data_dasar->nidn; ?><br/>
                      Pangkat/gol. Ruang/TMT&nbsp;&nbsp;: --<br/>
                      Unit Kerja&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: LLDIKTI Wilayah III D.K.I Jakarta <?php echo ' '.$data_dasar->nama_instansi; ?><br/>
                      dalam jabatan <?php echo $data_dasar->nama_jabatans; ?> dengan angka kredit sebesar <?php echo $data_dasar->kum; ?> (<?php echo $terbilang; ?>)<br/><br/>
                    </th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;">Kedua</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify">
                      Apabila kemudian hari ternyata terdapat kekeliruan dalam keputusan ini, akan diadakan perbaikan dan perhitungan kembali sebagaimana mestinya;</th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;">Ketiga</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify">
                      Asli Keputusan ini disampaikan kepada Dosen Tetap yang bersangkutan untuk diketahui dan diindahkan sebagaimana mestinya.
                     
                       </th>
                    </tr>

                 
                </table>
           <?php
           $tgl_tmt=date_create(date());
          $tgl_penatapan= date_format($tgl_tmt, 'd F Y');
           ?>

           
            <br>&nbsp;
            <div class="cust-print-table2 cust-table2-bordered">
                <table width="130%">
                    <tr>
                      <td colspan="8" style="vertical-align: top; border-left: none; border-right: none; width: 50%">
                      
                      </td>
                      <td style="vertical-align: top; border-left: none; border-right: none;">
                        Ditetapkan di&emsp;&emsp;&nbsp;: Jakarta
                        <br>Pada Tanggal&emsp;&emsp;: <input type="text" name="sk_tgl" class="form-control" id="datepicker-autoclose" placeholder="yyyy-mm-dd"  value="<?=$data_dasar->sk_tgl?>" style="width: 250px;" required="required">
                        <br>a.n. Menteri Pendidikan dan Kebudayaan
                        <br>Kepala LLDIKTI Wilayah III D.K.I Jakarta,
                        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                        
                        Illah Sailah
                        <br>NIP 195805211982112001
                        <br>&nbsp;
                      
                      </td>
                    </tr>
               
                      <tr class="bsmall">
                      <th colspan="8" class="text-left"style="width: 150px;">
                      Tembusan :
                      <br>1.	Sekretaris Jenderal Kementerian Pendidikan dan Kebudayaan di Jakarta;
                      <br>2.	Kepala Biro Sumber Daya Manusia Kementerian Pendidikan dan Kebudayaan Tinggi di Jakarta;
                      <br>3.	Kepala Badan Kepegawaian Negara;
                      <br>4.	Kepala Kantor Pelayanan Perbendaharaan Negara di Jakarta;
                      <br>3.	<?php echo $pimpinan.' '.$data_dasar->nama_instansi; ?></th>
                      <th class="text-left"></th>
                      <th class="text-justify">
                      
                      </th>
                    </tr>
                   
                  </tbody>
                </table>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"> Update SK</i></button>
                 <a href="<?php echo base_url('kepegawaian/kepegawaian/Show/'.$data_dasar->usulans_no); ?>"  class="btn btn-primary pull-right">Batal</a>  
             
             </form>  
                </div>
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                
                <form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/uploadSK" role="form" enctype="multipart/form-data">
                <div class="modal fade" id="uploadSKModal" 
        role="dialog" 
        aria-labelledby="uploadPakModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <input type="hidden" name="nidn" value="<?=$resume->nidn?>">
            <input type="hidden" name="no_usulan" value="<?php echo $no; ?>">
                <h4>Upload Scan Dokumen SK</h4>

                <div class="form-group">
                  <label for="berkas">Berkas Upload</label>
                  <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
                  <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>

            </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
</form>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?= base_url()?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
 <script src="<?= base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script>


jQuery('#datepicker-autoclose').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#datepicker-autoclose2').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   }
</script>