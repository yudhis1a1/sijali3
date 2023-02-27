<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Draft extends CI_Model {

public function get_draft($username,$role,$instansi)
{
	if($role=='3'){
		$query = "SELECT a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status`, a.usulan_status_id FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` AND a.usulan_status_id = '1' and b.nidn='$username'  group by b.`nidn`";
  }elseif($role=='4'){
    $query = "SELECT a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status`, i.kode , a.usulan_status_id FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` and i.kode='$instansi' AND a.usulan_status_id = '1'  group by b.`nidn`";
  }else{
		$query = "SELECT a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status` FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` AND a.usulan_status_id = '1'  group by b.`nidn`";
	}
	return $this->db->query($query)->result();
}

public function get_proses($username,$role,$instansi)
{
  if($role=='3'){
  $query = "SELECT  a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status` FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` and b.nidn='$username' AND a.usulan_status_id in ('2','3','4','5','6','7','8','9','10') group by b.`nidn`";
}elseif($role=='4'){

  $query = "SELECT  a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status`, i.kode FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` and i.kode='$instansi' AND a.usulan_status_id in ('2','3','4','5','6','7','8','9','10') group by b.`nidn`";
}else{
  $query = "SELECT  a.updated_at, a.no, b.nidn, b.nidk, b.nama, i.`nama_instansi`, h.`nama_prodi`, a.`jabatan_usulan_no`, e.`nama_jabatans`, e.`kum`, f.`nama_jenjang`, g.`nama_status` FROM usulans AS a, dosens AS b, jabatan_jenjangs AS d, jabatans AS e, jenjangs AS f, usulan_statuses AS g, prodis AS h, `instansis` AS i WHERE a.dosen_no = b.no AND b.`prodi_kode`=h.`kode` AND h.`instansi_kode`=i.`kode` AND a.`jabatan_usulan_no`=d.`no` AND d.`jabatan_kode`=e.`kode` AND d.`jenjang_id`=f.`id` AND a.`usulan_status_id`=g.`id` AND a.usulan_status_id in ('2','3','4','5','6','7','8','9','10') group by b.`nidn`";

        }
	return $this->db->query($query)->result();
}

function tampil_data($jabatan_no,$username,$role)
{ 
  if($role=='3'){

    $query = "SELECT a.no, a.nip, a.`nidn`, a.`nama`, a.`jabatan_tgl`, f.`nama_jabatans`, f.`kum`, b.`nama_jenjang`, a.`nip`, a.`karpeg`, a.`gelar_depan`, a.`gelar_belakang`, c.`nama_ikatan`, a.`pengangkatan_tgl`, d.`nama_prodi`, e.`nama_instansi`, a.`lahir_tempat`, a.`lahir_tgl`, a.`jk` FROM dosens AS a, `jenjangs` AS b, `ikatan_kerjas` AS c, prodis AS d, `instansis` AS e, jabatans AS f	WHERE a.`ikatan_kerja_kode` = c.`kode` AND a.`prodi_kode` = d.`kode` AND d.`instansi_kode` = e.`kode` AND a.`jabatan_no` = f.`kode` AND a.`jenjang_id` = b.`id` AND a.jabatan_no = '$jabatan_no' AND a.`ikatan_kerja_kode` IN ('A','B') and a.jenjang_id IN ('35','37','40','30') and a.nidn='$username' ";

  }else{

    $query = "SELECT a.no, a.nip, a.`nidn`, a.`nama`, a.`jabatan_tgl`, f.`nama_jabatans`, f.`kum`, b.`nama_jenjang`, a.`nip`, a.`karpeg`, a.`gelar_depan`, a.`gelar_belakang`, c.`nama_ikatan`, a.`pengangkatan_tgl`, d.`nama_prodi`, e.`nama_instansi`, a.`lahir_tempat`, a.`lahir_tgl`, a.`jk` FROM dosens AS a, `jenjangs` AS b, `ikatan_kerjas` AS c, prodis AS d, `instansis` AS e, jabatans AS f	WHERE a.`ikatan_kerja_kode` = c.`kode` AND a.`prodi_kode` = d.`kode` AND d.`instansi_kode` = e.`kode` AND a.`jabatan_no` = f.`kode` AND a.`jenjang_id` = b.`id` AND a.jabatan_no = '$jabatan_no' AND a.`ikatan_kerja_kode` IN ('A','B') and a.jenjang_id IN ('35','37','40') AND d.nama_prodi like '%komputer%' LIMIT 200";
  }

		return $this->db->query($query);
 }
 
 function tampil_golongan(){ 
  $query = "
  SELECT *from golongans order by nama asc
  ";
  return $this->db->query($query);
}
function tampil_jabat(){ 
  $query = "
  SELECT *from reff_japim
  ";
  return $this->db->query($query);
}
function tampil_japim(){ 
	$query = "
	SELECT * from reff_japim
	";
	return $this->db->query($query);
  }
function tampil_jenjang(){ 
  $query = "
  select * from
  jenjangs where ak not in ('0')
  ";
  return $this->db->query($query);
}
function tampil_bidang(){ 
  $query = "
  select * from
  bidang_ilmus
  order by nama_bidang asc";
  return $this->db->query($query);
}
function tampil_jabatan(){ 
  $query = "
  select * from
  jabatan_jenjangs as a,
  jabatans as b,
  jenjangs as c
  where
  a.jabatan_kode=b.kode
  and a.jenjang_id=c.id
  order by b.kode asc
  ";
  return $this->db->query($query);
}

function insert_data($data,$table){
  $this->db->insert($table,$data);
}
function hapus_data($id){
  $this->db->delete('usulan_matkuls',['no'=>$id]);
}
function hapus_pendidik($id){
  $this->db->delete('usulan_pendidikans',['no'=>$id]);
}
function hapus_usulan($id){
  $this->db->delete('usulans',['no'=>$id]);
}

function tampil_jabatan_jenjang($jabatan_akhir_no)
    {
      $query = "
      SELECT a.no,a.jabatan_akhir_no, a.jabatan_usulan_no,c.nama_jabatans,c.kum,d.nama_jenjang FROM jabatan_syarats AS a,
      jabatan_jenjangs AS b,
      jabatans AS c,
      jenjangs AS d 
      WHERE a.jabatan_usulan_no=b.no
      AND b.jabatan_kode=c.kode
      AND b.jenjang_id=d.id
      AND a.jabatan_akhir_no='$jabatan_akhir_no'";
  return $this->db->query($query);
    
    }
	
}
/* End of file Model_jabatan.php */
/* Location: ./application/modules/master_data/models/Model_jabatan.php */