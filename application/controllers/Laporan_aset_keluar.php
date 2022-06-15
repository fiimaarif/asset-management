<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class Laporan_aset_keluar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Laporan_aset_keluar_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Laporan Aset Keluar';
		$aset_keluar['aset_keluar'] = $this->Laporan_aset_keluar_model->getAllLaporanKeluar();

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Laporan/Laporan-aset-keluar/index',$aset_keluar);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function pdf()
	{
		$aset_keluar['aset_keluar'] = $this->Laporan_aset_keluar_model->getAllLaporanKeluar();
		$this->load->view('laporan_keluar_pdf', $aset_keluar);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$pdf = new Dompdf();

		$pdf->setPaper($paper_size, $orientation);
		$pdf->loadHtml($html);
		$pdf->render();
		$pdf->stream("laporan_aset_keluar.pdf", ["Attachment" => 0]);
	}

}