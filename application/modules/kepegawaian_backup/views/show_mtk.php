<?php
error_reporting(0);
?>
 
 <!-- row -->
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Matakuliah</h4>
                               
                                <div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mata Kuliah</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        foreach($data_mtk as $mtk){
                                            $i= $i + 1;
                                            ?>
                                     <tr>
                                        <td >
                                           <?php echo $i ;?>
                                        </td>
                                        <td>
                                        <?php echo $mtk->nama;?>
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