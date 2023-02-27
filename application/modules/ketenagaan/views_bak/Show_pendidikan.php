<?php
error_reporting(0);
?>
 
 <!-- row -->
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Riwayat Pendidikan</h4>
                               
                                <div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Riwayat Pendidikan</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($data_didik as $didik){
                                            $i= $i + 1;
                                            ?>
                                     <tr>
                                        <td >
                                           <?php echo $i ;?>
                                        </td>
                                        <td>
                                        <?php echo "$didik->nama_jenjang $didik->nama_bidang, $didik->tgl";?>
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
                <!-- row -->