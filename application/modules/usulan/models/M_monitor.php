<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_monitor extends CI_Model {
	
function __construct()
{
   parent::__construct();
	$this->db2 = $this->load->database('db2', TRUE);
}

function get_data($nidn)
{
	$hasil=$this->db2->query("SELECT DISTINCT
			s.id_sdm AS NO,
			s.nip,
			s.nidn,
			'' nidk,
			no_serdik,
			'' karpeg,
			s.nm_sdm AS nama,
			'' gelar_depan,
			'' gelar_belakang,
			j.id_jenjang_tertinggi AS jenjang_id,
			j.id_bid_studi AS bidang_ilmu_kode,
			r.id_ikatan_kerja AS ikatan_kerja_kode,
			s.tmt_sk_angkat AS pengangkatan_tgl,
			g.id_gol_tertinggi AS golongan_kode,
			tmt_sk_pangkat AS golongan_tgl,
			id_jabfung_tertinggi AS jabatan_no,
			tmt_sk_jabfung AS jabatan_tgl,
			pf.id_sms AS prodi_kode,
			s.tgl_lahir AS lahir_tgl,
			s.tmpt_lahir AS lahir_tempat,
			s.jk AS jk,
			s.id_stat_aktif AS aktif,
			s.nik AS nik,
			s.npwp AS npwp,
			s.no_hp AS no_hp,
			g.masa_kerja_gol_thn,
			g.masa_kerja_gol_bln,
			pf.nm_fakultas
		FROM
			sdm s
			INNER JOIN reg_ptk r ON s.id_sdm = r.id_sdm AND r.soft_delete = 0
			INNER JOIN keaktifan_ptk k ON r.id_reg_ptk = k.id_reg_ptk
			LEFT JOIN satuan_pendidikan p ON r.id_sp = p.id_sp AND p.soft_delete = 0 AND p.stat_sp = 'A'
			
			LEFT JOIN (
				SELECT
					MAX( a.id_sdm ) AS id_sdm,
					MAX( m.id_jenj_didik ) AS id_jenjang_tertinggi,
					MAX( m.id_bid_studi ) AS id_bid_studi 
				FROM
					sdm a
					JOIN rwy_pend_formal m ON a.id_sdm = m.id_sdm 
				GROUP BY
					m.id_sdm 
			) j ON j.id_sdm = s.id_sdm 
			
			LEFT JOIN (
					SELECT MAX( id_pangkat_gol ) AS id_gol_tertinggi, 
						MAX( tmt_sk_pangkat ) AS tmt_sk_pangkat, 
						id_sdm, 
						MAX(masa_kerja_gol_thn) AS masa_kerja_gol_thn, 
						MAX(masa_kerja_gol_bln) AS masa_kerja_gol_bln
					FROM rwy_kepangkatan 
						WHERE soft_delete = 0 
						AND id_pangkat_gol <> 99 
						AND LEFT ( tmt_sk_pangkat, 4 ) <> '1970' 
						GROUP BY id_sdm 
				) g ON g.id_sdm = s.id_sdm 
			
			LEFT JOIN (
				SELECT 
					MAX( id_jabfung ) AS id_jabfung_tertinggi, 
					MAX( tmt_sk_jabfung ) AS tmt_sk_jabfung,  
					id_sdm 
				FROM rwy_fungsional 
				WHERE 
					soft_delete = 0 
				GROUP BY id_sdm
				) jf ON jf.id_sdm = s.id_sdm
			
			LEFT JOIN(
				SELECT
				MAX(rser.id_sdm) AS id_sdm,
				MAX(rser.nrg) AS no_serdik,
				MAX(rser.id_bid_studi) AS id_bid_studi
			FROM
				sdm ser
				JOIN rwy_sertifikasi rser ON ser.id_sdm= rser.id_sdm
				where
				rser.nrg is not null
				AND rser.soft_delete='0'
				AND rser.id_jns_sert='1'
				GROUP BY rser.id_sdm
			) ns ON ns.id_sdm=s.id_sdm
			
			LEFT JOIN(
					SELECT
					MAX(af.id_sdm)AS id_sdm,
					MAX(bf.id_sms) AS id_sms,
					MAX(nm_fakultas) AS nm_fakultas 
				FROM
					sdm af
					JOIN reg_ptk bf ON af.id_sdm = bf.id_sdm
					JOIN sms cf ON bf.id_sms = cf.id_sms
					JOIN keaktifan_ptk df ON bf.id_reg_ptk = df.id_reg_ptk
					JOIN satuan_pendidikan ef ON cf.id_sp = ef.id_sp
					LEFT JOIN ( SELECT id_sms, nm_lemb AS nm_fakultas FROM sms ) ff ON ff.id_sms = cf.id_induk_sms 
				WHERE
					bf.soft_delete = '0' 
					AND af.soft_delete = '0' 
					AND df.a_sp_homebase = '1' 
					AND df.id_thn_ajaran = '2020' 
					AND LEFT(ef.npsn,2)='03'
				GROUP BY af.id_sdm
			)pf ON pf.id_sdm=s.id_sdm
		WHERE
			k.a_sp_homebase = '1' 
			AND s.soft_delete = '0' 
			AND k.soft_delete = '0' 
			AND k.id_thn_ajaran IN ( '2020' ) 
			AND LEFT ( p.npsn, 2 ) = '03'
			AND s.nidn='$nidn'");

    return $hasil;
}
	
}
/* End of file Model_jabatan.php */
/* Location: ./application/modules/master_data/models/Model_jabatan.php */