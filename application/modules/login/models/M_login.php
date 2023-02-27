<?php 
defined('BASEPATH') or exit ('No dirext script access allowed');
class M_login extends CI_Model{

	 function logged_id()
    {
        return $this->session->userdata('user_id');
    }
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    function get_data($table){
        return $this->db->get($table);
    }
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    //========Provinsi======
    //========Provinsi======
    public function getProv()
    {
    $sql="SELECT * FROM provinsi";
    $query=$this->db->query($sql);
    return $query->result();
    }
    public function getKab($id_prov)
    {
      $sql="SELECT * FROM kabupaten WHERE id_prov={$id_prov} ORDER BY nama_kab";
      $query=$this->db->query($sql);
    return $query->result();
    }

    public function getKec($id_kab)
    {
      $sql="SELECT * FROM kecamatan WHERE id_kab={$id_kab} ORDER BY nama_kec";
      $query=$this->db->query($sql);
    return $query->result();
    }

    public function getKel($id_kec)
    {
      $sql="SELECT * FROM kelurahan WHERE id_kec={$id_kec} ORDER BY nama_kel";
      $query=$this->db->query($sql);
    return $query->result();
    }


	//fungsi check login
    function check_login($table, $field1, $field2, $field3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function check_in($table, $field1)
    {
        $this->silat = $this->load->database('silat', TRUE);
        $this->silat->select('*');
        $this->silat->from($table);
        $this->silat->where($field1);
        $this->silat->limit(1);
        $query = $this->silat->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function getall()
    {
      $sql="SELECT
  *
FROM
  asesi AS a,
  provinsi AS b,
  kecamatan AS c,
  kelurahan AS d,
  kabupaten AS e,
  skema AS f
WHERE a.id_prov=b.id_prov 
AND a.id_kec=c.id_kec 
AND a.id_kel=d.id_kel 
AND a.id_kab=e.id_kab 
AND a.id_skema=f.id_skema 
AND a.id_asesi = '".$this->session->userdata('user_id')."'";
      $query=$this->db->query($sql);
    return $query->result();
    }
}