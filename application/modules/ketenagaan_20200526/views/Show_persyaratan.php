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
	$no;			
	$ceklist= $this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no'")->row();
	?>     
                                
                               
								<div class="table-responsive">
            <table id="table-matkul" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;">No.</th>
                    <th class="text-center">Persyaratan.</th>
                    <th colspan="2" class="text-center">
                    
                   View
                   
                    </th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <td class="text-center">1</td>
                <td>Surat Pengantar dari Pimpinan PTS (Rektor/Ketua/Direktur)</td>
                <?php  if(isset($ceklis->surat_pengantar)){ ?>
                    <td class="text-center" style="width: 50px;">
                
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->surat_pengantar ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                
              
            </td>
        
               <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="surat_pengantar" data-judul="Surat Pengantar dari Pimpinan PTS" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
               
                
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td>Fotocopy SK Pengangkatan sebagai Dosen Tetap Yayasan dilegalisir</td>
                <?php if(isset($ceklis->sk_pengangkatan)){ ?>
                <td class="text-center" style="width: 50px;">
                
                   
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_pengangkatan ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                    
                  
                </td>
          
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sk_pengangkatan" data-judul="Fotocopy SK Pengangkatan sebagai Dosen Tetap Yayasan dilegalisir" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
          
              <tr>
                <td class="text-center">3</td>
                <td>Daftar Usul Penetapan Angka Kredit (DUPAK)</td>
                <?php if(isset($ceklis->dupak)){ ?>
                <td class="text-center" style="width: 50px;">
                 
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->dupak ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                  
                </td>
          
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="dupak" data-judul="Daftar Usul Penetapan Angka Kredit (DUPAK)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
              <tr>
                <td class="text-center">4</td>
                <td>Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A), beserta data pendukungnya</td>
                <?php if(isset($ceklis->sp_pengajaran)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sp_pengajaran ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
             
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sp_pengajaran" data-judul="Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A), beserta data pendukungnya" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
              <tr>
                <td class="text-center">5</td>
                <td>Surat Pernyataan Melaksanakan Penelitian (Bidang B), beserta Karya llmiah yang asli</td>
                <?php if(isset($ceklis->sp_penelitian)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sp_penelitian ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                    
                  
                </td>
             
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sp_penelitian" data-judul="Surat Pernyataan Melaksanakan Penelitian (Bidang B), beserta Karya llmiah yang asli" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
              <tr>
                <td class="text-center">6</td>
                <td>Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C), beserta data pendukungnya</td>
                <?php if(isset($ceklis->sp_pengabdian)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sp_pengabdian ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sp_pengabdian" data-judul="Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C), beserta data pendukungnya" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
              <tr>
                <td class="text-center">7</td>
                <td>Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D), beserta data pendukungnya</td>
                <?php if(isset($ceklis->sp_penunjang)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sp_penunjang ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                  
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sp_penunjang" data-judul="Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D), beserta data pendukungnya" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
              <tr>
                <td class="text-center">8</td>
                <td>Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik (<a href="<?= base_url()?>assets/download_berkas/SENAT.pdf" target="_blank">Format Terlampir</a>) + Daftar Hadir</td>
                <?php if(isset($ceklis->ba_senat)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->ba_senat ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
           
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="ba_senat" data-judul="Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik (Format Terlampir) + Daftar Hadir" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php }?>
              </tr>
           
              <tr>
                <td class="text-center">9</td>
                <td>Surat Pernyataan Keabsahan Karya llmiah yang ditandatangani Dosen ybs. (<a href="<?= base_url()?>assets/download_berkas/KEABSAHAN KARYA ILMIAH .pdf" target="_blank">Format Terlampir</a>)</td>
                <?php if(isset($ceklis->sp_karya_ilmiah)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sp_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
          
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sp_karya_ilmiah" data-judul="Surat Pernyataan Keabsahan Karya llmiah yang ditandatangani Dosen ybs. (Format Terlampir)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">10</td>
                <td>Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS (<a href="<?= base_url()?>assets/download_berkas/PENGESAHAN VALIDASI KARYA ILMIAH.pdf" target="_blank">Format Terlampir</a>)</td>
                <?php if(isset($ceklis->validasi_karya_ilmiah)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->validasi_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                  
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="validasi_karya_ilmiah" data-judul="Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS (Format Terlampir)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
       
       
              <tr>
                <td class="text-center">11</td>
                <td>Fotocopy SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/ menyelesaikan studi lanjut)</td>
                <?php if(isset($ceklis->sk_tugas_belajar)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_tugas_belajar ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
           
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sk_tugas_belajar" data-judul="Fotocopy SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/ menyelesaikan studi lanjut)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">12</td>
                <td>Fotocopy SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut dengan status tugas belajar)</td>
                <?php if(isset($ceklis->sk_aktif_kembali)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_aktif_kembali ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sk_aktif_kembali" data-judul="Fotocopy SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut dengan status tugas belajar)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">13</td>
                <td>Fotocopy SK Dosen PNS (bagi dosen PNS dpk.)</td>
                <?php if(isset($ceklis->sk_dosen_pns)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_dosen_pns ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sk_dosen_pns" data-judul="Fotocopy SK Dosen PNS (bagi dosen PNS dpk.)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">14</td>
                <td>Fotocopy Keputusan Kepala BKN tentang penetapan NIP Baru (bagi dosen PNS dpk.)</td>
                <?php if(isset($ceklis->sk_nip_baru)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_nip_baru ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="sk_nip_baru" data-judul="Fotocopy Keputusan Kepala BKN tentang penetapan NIP Baru (bagi dosen PNS dpk.)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">15</td>
                <td>Fotocopy Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT) (bagi dosen PNS dpk.)</td>
                <?php if(isset($ceklis->spmj_spmt)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->spmj_spmt ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                  <a href=""  data-nama="spmj_spmt" data-judul="Fotocopy Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT)  (bagi dosen PNS dpk.)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                </td>
                <?php } ?>
              </tr>
              <tr>
                <td class="text-center">16</td>
                <td>Fotocopy SK Jabatan Akademik Dosen (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
                  <?php if(isset($ceklis->sk_jad_dosen)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_jad_dosen ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
            
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
                <a href=""  data-nama="sk_jad_dosen" data-judul="Fotocopy SK Jabatan Akademik Dosen (bagi yang mengajukan Kenaikan Jabatan/Pangkat)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
              
                <?php } ?>
                </td>
             
              </tr>
              <tr>
                <td class="text-center">17</td>
                <td>Fotocopy SK PAK dan SK Pangkat/Inpassing
                  Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
                  <?php if(isset($ceklis->sk_jad_inpassing)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->sk_jad_inpassing ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
             
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
              <a href="" data-nama="sk_jad_inpassing" data-judul="Fotocopy SK Pangkat/Inpassing Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
              
                <?php } ?>
                </td>
             
              </tr>
              <tr>
                <td class="text-center">18</td>
                <td>Scan Asli Sertifikat Pendidik (bagi yang telah memiliki)</td>
                <?php if(isset($ceklis->serdik)){ ?>
                <td class="text-center" style="width: 50px;">
                <a href="<?= base_url()?>assets/download_syarat/<?= $ceklis->serdik ?>" target="_blank" class="btn btn-xs btn-info">
                  <i class="fa fa-search"></i>
                </a>
                </td>
             
                <?php }else{ ?>
                <td class="text-center" style="width: 50px;" colspan="2">
              <a href="" data-nama="serdik" data-judul="Fotocopy Sertifikat Pendidik Legalisir (bagi yang telah memiliki)" class="btn btn-xs btn-danger"><i class="fa fa-search"></i></a>
                 
                <?php } ?>
                </td>
             
              </tr>
            
             
        
        
           
                </tbody>
            </table>
        </div>
                </div>
            </div>
         
                            </div>
                        </div>
                    </div>
               
               
                <!-- row -->
                
