<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_formulir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_formulir');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$data['title'] = 'Formulir Pendaftaran';
		$data['subtitle'] = 'Pendaftaran Baru';
		$data['content'] = 'pendaftar/form_daftar';

		$data['user'] = $this->db->get_where('tb_register', ['nama_register' => $this->session->userdata('nama_register')])->row_array();

		$this->load->view('pendaftar/header', $data); 
		$this->load->view('pendaftar/menu', $data); 
		$this->load->view('pendaftar/template', $data);
		$this->load->view('pendaftar/footer', $data);
		
	}
	public function insertFormulir()
	{
		$nik_pendaftar = $this->input->post('nik_pendaftar');
		$skhun_pendaftar = $this->input->post('skhun_pendaftar');
		$nama_pendaftar = $this->input->post('nama_pendaftar');
		$jk_pendaftar = $this->input->post('jk_pendaftar');
		$ttl_pendaftar = $this->input->post('ttl_pendaftar');
		$almt_jl_pendaftar = $this->input->post('almt_jl_pendaftar');
		$almt_desa_pendaftar = $this->input->post('almt_desa_pendaftar');
		$almt_rt_rw_pendaftar = $this->input->post('almt_rt_rw_pendaftar');
		$almt_kec_pendaftar = $this->input->post('almt_kec_pendaftar');
		$almt_kab_pendaftar = $this->input->post('almt_kab_pendaftar');
		$telp_hp_pendaftar = $this->input->post('telp_hp_pendaftar');
		$asal_sekolah_pendaftar = $this->input->post('asal_sekolah_pendaftar');
		$no_ijazah_pendaftar = $this->input->post('no_ijazah_pendaftar');
		$thn_lulus_pendaftar = $this->input->post('thn_lulus_pendaftar');
		$nama_ayah_pendaftar = $this->input->post('nama_ayah_pendaftar');
		$nama_ibu_pendaftar = $this->input->post('nama_ibu_pendaftar');
		$prj_orang_tua_pendaftar = $this->input->post('prj_orang_tua_pendaftar');
		$ppn_orang_tua_pendaftar = $this->input->post('ppn_orang_tua_pendaftar');
		$pendidikan_orang_tua_pendaftar = $this->input->post('pendidikan_orang_tua_pendaftar');
		$almt_jl_orang_tua_pendaftar = $this->input->post('almt_jl_orang_tua_pendaftar');
		$almt_desa_orang_tua_pendaftar = $this->input->post('almt_desa_orang_tua_pendaftar');
		$almt_rt_rw_orang_tua_pendaftar = $this->input->post('almt_rt_rw_orang_tua_pendaftar');
		$almt_kec_orang_tua_pendaftar = $this->input->post('almt_kec_orang_tua_pendaftar');
		$almt_kab_orang_tua_pendaftar = $this->input->post('almt_kab_orang_tua_pendaftar');
		$telp_hp_orang_tua_pendaftar = $this->input->post('telp_hp_orang_tua_pendaftar');
		$config['upload_path'] = './upload/pendaftar/kk/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_kk')) {



        } else {
        	$result = $this->upload->data();
            $result1 =$result['file_name'];
        }

        $config['upload_path'] = './upload/pendaftar/akte/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_akte')) {



        } else {
        	$result = $this->upload->data();
            $result2 =$result['file_name'];
        }  

        $config['upload_path'] = './upload/pendaftar/ktp_orangtua/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_ktp')) {



        } else {
        	$result = $this->upload->data();
            $result3 =$result['file_name'];
        } 

        $config['upload_path'] = './upload/pendaftar/ijazah/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_ijazah')) {



        } else {
        	$result = $this->upload->data();
            $result4 =$result['file_name'];
        } 

        $config['upload_path'] = './upload/pendaftar/skhun/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_skhun')) {



        } else {
        	$result = $this->upload->data();
            $result5 =$result['file_name'];
        }
        $id_jurusan = $this->input->post('id_jurusan'); 

		$data = array(
			'nik_pendaftar' => $nik_pendaftar,
			'skhun_pendaftar' => $skhun_pendaftar,
			'nama_pendaftar' => $nama_pendaftar,
			'jk_pendaftar' => $jk_pendaftar,
			'ttl_pendaftar' => $ttl_pendaftar,
			'almt_jl_pendaftar' => $almt_jl_pendaftar,
			'almt_desa_pendaftar' => $almt_desa_pendaftar,
			'almt_rt_rw_pendaftar' => $almt_rt_rw_pendaftar,
			'almt_kec_pendaftar' => $almt_kec_pendaftar,
			'almt_kab_pendaftar' => $almt_kab_pendaftar,
			'telp_hp_pendaftar' => $telp_hp_pendaftar,
			'asal_sekolah_pendaftar' => $asal_sekolah_pendaftar,
			'no_ijazah_pendaftar' => $no_ijazah_pendaftar,
			'thn_lulus_pendaftar' => $thn_lulus_pendaftar,
			'nama_ayah_pendaftar' => $nama_ayah_pendaftar,
			'nama_ibu_pendaftar' => $nama_ibu_pendaftar,
			'prj_orang_tua_pendaftar' => $prj_orang_tua_pendaftar,
			'ppn_orang_tua_pendaftar' => $ppn_orang_tua_pendaftar,
			'pendidikan_orang_tua_pendaftar' => $pendidikan_orang_tua_pendaftar,
			'almt_jl_orang_tua_pendaftar' => $almt_jl_orang_tua_pendaftar,
			'almt_desa_orang_tua_pendaftar' => $almt_desa_orang_tua_pendaftar,
			'almt_rt_rw_orang_tua_pendaftar' => $almt_rt_rw_orang_tua_pendaftar,
			'almt_kec_orang_tua_pendaftar' => $almt_kec_orang_tua_pendaftar,
			'almt_kab_orang_tua_pendaftar' => $almt_kab_orang_tua_pendaftar,
			'telp_hp_orang_tua_pendaftar' => $telp_hp_orang_tua_pendaftar,
			'foto_kk' => $result1,
			'foto_akte' => $result2,
			'foto_ktp' => $result3,
			'foto_ijazah' => $result4,
			'foto_skhun' => $result5,
			'id_jurusan' => $id_jurusan
		);
		$this->M_formulir->input($data);
		redirect('pendaftar/C_calon_siswa');
	}
}