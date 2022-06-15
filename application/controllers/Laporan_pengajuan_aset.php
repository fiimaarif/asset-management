<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class Laporan_pengajuan_aset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Laporan_pengajuan_aset_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Laporan Pengajuan aset';
		$pengajuan['pengajuan'] = $this->Laporan_pengajuan_aset_model->getAllLaporanPengajuan();

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Laporan/Laporan-pengajuan-aset/index',$pengajuan);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function pdf()
	{
		$pengajuan['pengajuan'] = $this->Laporan_pengajuan_aset_model->getAllLaporanPengajuan();
		$this->load->view('laporan_pengajuan_pdf', $pengajuan);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$pdf = new Dompdf();

		$pdf->setPaper($paper_size, $orientation);
		$pdf->loadHtml($html);
		$pdf->render();
		$pdf->stream("laporan_pengajuan_aset.pdf", ["Attachment" => 0]);
	}

}