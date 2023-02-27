<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dupak extends CI_Model {

	
 function tampil_golongan(){ 
  $query = "
  select * from
  golongans
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
  ";
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
function update_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
  
}
function update_a0001($no,$data){
$this->db->where('no', $id);
      return $this->db->update('usulan_dupak_details', $simpan);
}
function delete_data($where,$table){
  $this->db->where($where);
  $this->db->delete($table);
}

function tampil_jabatan_jenjang($id)
    {
      $query = "
      SELECT * FROM jabatan_syarats AS a,
      jabatan_jenjangs AS b,
      jabatans AS c,
      jenjangs AS d 
      WHERE a.jabatan_usulan_no=b.no
      AND b.jabatan_kode=c.kode
      AND b.jenjang_id=d.id
      AND a.jabatan_akhir_no='$id'
  ";
  return $this->db->query($query);
    
    }
	
}
/* End of file Model_jabatan.php */
/* Location: ./application/modules/master_data/models/Model_jabatan.php */