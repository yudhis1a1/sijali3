<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Draft Usulan</h4>
			   
				<div class="table-responsive m-t-40">
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="text-center" ><i class="fa fa-eye"></i></th>
							<th>Resume</th>
							<th>Status Usulan</th>                                       
							<th>No</th>
							<th>NIDN</th>
							<th>NIDK</th>
							<th>Nama</th>
							<th>Nama Instansi</th>
							<th>Prodi</th>
							<th>JAD Usulan</th>
							<th>Updated</th> 
							</tr>
						</thead>
						<tbody>
							<?php
						   // $query=$this->db->query('Select * from dosens order by nidn');

								foreach ($dosen as $row)
								{
							   
								?>
							<tr>
								<td >
								<a href="<?= base_url(); ?>penilai/penilai/penilaian/<?php echo $row->no ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
								</td>
								<td>
								<a href="<?= base_url(); ?>penilai/penilai/tampil_resume/<?php echo $row->no ?>" title="Resume Dosen" target="_blank" class="btn btn-success">Resume</a>
								</td>
								<td><h3><center><span class="label label-danger"><?php echo $row->nama_status ?></span></center></h3></td>
								<td><?php echo $row->no ?></td>
								<td><?php echo $row->nidn ?></td>
								<td><?php echo $row->nidk ?></td>
								<td><?php echo $row->nama ?></td>
								<td><?php echo $row->nama_instansi ?></td>
								<td><?php echo $row->nama_prodi ?></td>
								<td><?php echo $row->nama_jabatans ?>-<?php echo $row->kum ?>(<?php echo $row->nama_jenjang ?>)</td>
								<td><?php echo $row->updated_at ?></td>
								
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


                        
