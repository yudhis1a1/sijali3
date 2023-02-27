<?php
Class jadwal extends EL_Controller{
	function __construct() {
        parent::__construct();                
        $this->load->library('sessionutility');

        if(!$this->sessionutility->validateSession()){
            redirect(base_url().'officer/form_login');
        }

        //$this->load->model('ModUsers');
        $this->load->model('modOfficer');
        $this->load->model('mbaak');
        $this->load->helper('datatables');
        $this->load->helper('sidebar');
        log_access($this->session->userdata('userid'));  
	}	

    public function index() {

        //var_dump($this);
        //var_dump($this->sessionutility->validateAccess($this));
        //exit;
        if($this->sessionutility->validateAccess($this)){
        //if ($this->session->userdata('is_loged_in') == TRUE){

            echo add_footer_vendor_css('vendor/DataTables-1.10.6/media/css/jquery.dataTables.css');
            echo add_footer_vendor_css('vendor/DataTables-1.10.6/extensions/TableTools/css/dataTables.tableTools.css');
            echo add_footer_vendor_css('vendor/DataTables/media/css/dataTables.bootstrap.css');
            echo add_footer_vendor_js('vendor/DataTables-1.10.6/media/js/jquery.dataTables.min.js');
            echo add_footer_vendor_js('assets/js/plugins/dataTables/jquery.dataTables.js');
            echo add_footer_vendor_js('vendor/DataTables-1.10.6/extensions/TableTools/js/dataTables.tableTools.js');
            echo add_footer_vendor_js('assets/js/plugins/dataTables/dataTables.bootstrap.js');

            $data['title']      = "Jadwal Perkuliah";
            $data['subtitle']   = "";
            $this->template->load('layout','jadwal_list',$data);

        }else{
            $msg = "Anda tidak behak akses halaman tersebut, atau anda harus login terlebih dahulu";
            $this->session->set_flashdata(
               'msg', 
               '<div class="callout callout-danger"><h4>Maaf !</h4>'.$msg.'</div>'
            );          
            redirect('officer/form_login');                        
        }
    }


    /*** DataTables ***/
    public function lookup()
    {
        // DB table to use
        $table = "
            SELECT
                tbl_pertemuan.kd_klh
                , tbl_pertemuan.jam_klh
                , tbl_pertemuan.kd_kelas
                , tbl_pertemuan.no_ruang
                , tbl_pertemuan.kd_mtk
                , tbl_matakuliah.nm_mtk
                , tbl_matakuliah.sks
                , tbl_pertemuan.kd_dosen
                , tbl_dosen.nm_dosen
                , tbl_pertemuan.kd_fakultas
                , tbl_fakultas.nama_fakultas
            FROM
                tbl_matakuliah
                INNER JOIN tbl_pertemuan 
                    ON (tbl_matakuliah.kd_mtk = tbl_pertemuan.kd_mtk)
                INNER JOIN tbl_dosen 
                    ON (tbl_dosen.kd_dosen = tbl_pertemuan.kd_dosen)
                INNER JOIN tbl_fakultas 
                    ON (tbl_fakultas.kd_fakultas = tbl_pertemuan.kd_fakultas)

        ";

        //$data = $this->mbaak->getProdi($t1,$t2,$relation1,$type)

        // Table's primary key
        $primaryKey = 'kd_klh';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'kd_klh', 'dt' => 0 ),
            array( 'db' => 'jam_klh',  'dt' => 1 ),
            array( 'db' => 'kd_kelas',  'dt' => 2 ),
            array( 'db' => 'no_ruang',  'dt' => 3 ),
            
            array( 'db' => 'nm_mtk',  'dt' => 4 ),
            array( 'db' => 'sks',  'dt' => 5 ),

            
            array( 'db' => 'nm_dosen',  'dt' => 6 ),
            

            array( 'db' => 'nama_fakultas',  'dt' => 7 )
        );  
        
        echo json_encode(
            multiple( $_GET, $table, $primaryKey, $columns )
        );
    }


/** add, edit, delete */
    public function add()
    {
        if($this->sessionutility->validateAccess($this))
        {
            echo add_header_css('timepicker/bootstrap-timepicker.min.css');
            echo add_footer_js('plugins/timepicker/bootstrap-timepicker.min.js');

            $data['title']      = "Jadwal Perkuliahan";
            $data['subtitle']   = "Input Jadwal";

            //get fakultas
            $data['fakultas'] = $this->db->get('tbl_fakultas');
            $data['ruang'] = $this->db->get('tbl_ruang');
            $data['mtk'] = $this->db->query("select * from tbl_matakuliah order by nm_mtk asc");
            $data['dosen'] = $this->db->get('tbl_dosen');
            $data['periode'] = $this->db->query("select * from tbl_periode order by kd_periode desc");

            $this->template->load('layout','jadwal_form',$data);
        }else{
            $msg = "Anda tidak behak akses halaman tersebut, atau anda harus login terlebih dahulu";
            $this->session->set_flashdata(
               'msg', 
               '<div class="callout callout-danger"><h4>Maaf !</h4>'.$msg.'</div>'
            );          
            redirect('officer/form_login');                        
        } 
    }

    public function edit()
    {
        if($this->sessionutility->validateAccess($this))
        {


        }else{
            $msg = "Anda tidak behak akses halaman tersebut, atau anda harus login terlebih dahulu";
            $this->session->set_flashdata(
               'msg', 
               '<div class="callout callout-danger"><h4>Maaf !</h4>'.$msg.'</div>'
            );          
            redirect('officer/form_login');                        
        }         
    }

    public function delete()
    {
        if($this->sessionutility->validateAccess($this))
        {

        }else{
            $msg = "Anda tidak behak akses halaman tersebut, atau anda harus login terlebih dahulu";
            $this->session->set_flashdata(
               'msg', 
               '<div class="callout callout-danger"><h4>Maaf !</h4>'.$msg.'</div>'
            );          
            redirect('officer/form_login');                        
        }         
    } 
 

    public function save()
    {


        if($this->sessionutility->validateAccess($this))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
            $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
            $this->form_validation->set_rules('kelas', 'Kelas', 'required');
            $this->form_validation->set_rules('ruang', 'Ruangan', 'required');
            $this->form_validation->set_rules('mtk', 'Mata Kuliah', 'required');
            $this->form_validation->set_rules('hari', 'Hari Kuliah', 'required');
            $this->form_validation->set_rules('jammulai', 'Hari Kuliah', 'required');
            $this->form_validation->set_rules('jamselesai', 'Hari Kuliah', 'required');
            $this->form_validation->set_rules('kd_dosen', 'Nama Dosen Pengajar', 'required');
            $this->form_validation->set_rules('periode', 'Periode', 'required');

            if($this->input->post('ajax')=="add")
            {
                if($this->form_validation->run() == FALSE) {
                   $msg = validation_errors();
                   $this->session->set_flashdata(
                      'msg', 
                      '<div class="callout callout-danger">'.$msg.'</div>'
                   );                             
                   redirect('adminbaak/jadwal/add');                
                }else{
                   $data = array(
                      'kd_klh' => $this->input->post('mtk').".".$this->input->post('kelas'),
                      'jam_klh' => $this->input->post('jammulai').".".$this->input->post('jamselesai'),
                      'kd_fakultas' => $this->input->post('fakultas'),
                      'kd_jrs' => $this->input->post('prodi'),
                      'kd_kelas' => $this->input->post('kelas'),
                      'no_ruang' => $this->input->post('ruang'),
                      'kd_mtk' => $this->input->post('mtk'),
                      'kd_dosen' => $this->input->post('kd_dosen'),
                      'hari' => $this->input->post('hari'),
                      'mulai_klh' => $this->input->post('jammulai'),
                      'sampai_klh' => $this->input->post('jamselesai'),
                      'periode' => $this->input->post('periode')                     
                   );
                   
                   if($this->db->insert('tbl_pertemuan',$data))
                   {
                        redirect('adminbaak/jadwal');
                   }
                }

            }elseif($this->input->post('ajax')=="edit"){
    
                if($this->form_validation->run() == FALSE) {
                   $msg = validation_errors();
                   $this->session->set_flashdata(
                      'msg', 
                      '<div class="callout callout-danger">'.$msg.'</div>'
                   );                             
                   redirect('officer/jadwal/edit');                
                }else{
                   $data = array(
                      'kd_klh' => $this->input->post('mtk').".".$this->input->post('kd_kelas'),
                      'kd_fakultas' => $this->input->post('fakultas'),
                      'kd_jrs' => $this->input->post('prodi'),
                      'kd_kelas' => $this->input->post('kelas'),
                      'no_ruang' => $this->input->post('ruang'),
                      'kd_mtk' => $this->input->post('mtk'),
                      'kd_dosen' => $this->input->post('kd_dosen'),
                      'hari' => $this->input->post('hari'),
                      'mulai_klh' => $this->input->post('jammulai'),
                      'sampai_klh' => $this->input->post('jamselesai'),
                      'periode' => $this->input->post('periode') 
                   );
                   $this->db->where('kd_klh',$this->input->post('kd_klh_old'));
                   
                   if($this->db->update('tbl_pertemuan', $data))
                   {
                         redirect('officer/jadwal');
                   }
                }

            }

        }else{
            $msg = "Anda tidak behak akses halaman tersebut, atau anda harus login terlebih dahulu";
            $this->session->set_flashdata(
               'msg', 
               '<div class="callout callout-danger"><h4>Maaf !</h4>'.$msg.'</div>'
            );          
            redirect('officer/form_login');                        
        }         
        
    } 


}