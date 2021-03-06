<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
// require_once("dompdf/autoload.inc.php");
/**
 * 
 */
class C_download extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','download'));
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('form');
		$this->load->model('M_register');
		$this->load->model('M_formulir');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'SMK RISTEK INDRAMAYU';
		$data['content'] = 'pendaftar/home';

		$id_register = $this->session->userdata('id_register');
    	$data['notif'] = $this->db->get('tb_notif')->result();
    	$data['count'] = $this->M_register->getCountNotif($id_register);

		$data['user'] = $this->db->get_where('tb_register', ['nama_register' => $this->session->userdata('nama_register')])->row_array();
		

		$this->load->view('pendaftar/header', $data);
		$this->load->view('pendaftar/menu', $data);
		$this->load->view('pendaftar/download', $data);
	}

	public function lakukan_download()
	{

		$name = 'Formulir Pendaftaran Ristek.docx';
		$data = file_get_contents('./upload/formulir/formulir_ristek.docx');
		// var_dump($data); die();
		force_download($name, $data);
		// var_dump(force_download($name, $data)); die();
		// force_download('./upload/formulir/formulir_ristek.docx',NULL);
	}
	// public function downloadBukti()
	// {
	// 	$id_register=$this->session->userdata('id_register');
	// 	$cekdata=$this->db->query("SELECT * FROM tb_pendaftar WHERE id_register='$id_register'")->num_rows();
	// 	if($cekdata>0){
	// 		echo "sudah daftar";
	// 	}else{
	// 		echo "belum daftar";
	// 	}

	// }

	public function downloadBukti($id_register) {
		$id_register = array('id_register' => $id_register);
		$tanggal = date('d-m-Y');
		$data['data_formulir'] = $this->M_register->getForPDF($id_register,'tb_pendaftar')->result();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4','potrait');
		// $dompdf->render();
		$this->pdf->filename = "Bukti Pendaftaran tanggal ".$tanggal.".pdf";
		$this->pdf->load_view('pendaftar/pdf', $data);
     }

     public function downloadKartu($id_register) {
     	$id_register = array('id_register' => $id_register);
     	$tanggal = date('d-m-Y');
     	$data['data_formulir'] = $this->M_register->getForPDF($id_register,'tb_pendaftar')->result();
     	$this->load->library('pdf');
     	$this->pdf->setPaper('A4','potrait');
     	$this->pdf->filename = "Kartu Tanda Siswa ";
     	$this->pdf->load_view('pendaftar/kartu', $data);
     }
}