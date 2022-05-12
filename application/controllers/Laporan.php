<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Laporan_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Laporan Data Aset';
		$aset['aset'] = $this->Laporan_model->getAllLaporan();

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Laporan/index',$aset);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function pdf()
	{
		$aset['aset'] = $this->Laporan_model->getAllLaporan();
		$this->load->view('laporan_pdf', $aset);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$pdf = new Dompdf();

		$pdf->setPaper($paper_size, $orientation);
		$pdf->loadHtml($html);
		$pdf->render();
		$pdf->stream("laporan_aset.pdf", ["Attachment" => 0]);
	}

}