<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class C_dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_dashboard');
	}
	

	public function index()
	{
		if(!$this->session->userdata('username'))
			redirect('auth');
		$data['user'] = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
		$data2['dashboard'] = [
			'pegawai'=>$this->M_dashboard->tampil(),
			'siswa'=>$this->M_dashboard->tampilSiswa(),
			'pendaftar'=>$this->M_dashboard->tampilPendaftar(),
			'multimedia'=>$this->M_dashboard->tampilMultimedia(),
			'berita' =>$this->M_dashboard->tampilBerita(),
			'perbank' =>$this->M_dashboard->tampilPerbank(),
			'fasilitas' =>$this->M_dashboard->tampilFasilitas(),
			'smk' =>$this->M_dashboard->tampilSmk(),
			'operator' =>$this->M_dashboard->tampilOperator(),
			'pengguna' =>$this->M_dashboard->tampilPengguna(),
			'broadcast' =>$this->M_dashboard->tampilBroadcast(),
			'jurusan' =>$this->M_dashboard->tampilJurusan(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data2);
		$this->load->view('templates/footer', $data);
	}
}
