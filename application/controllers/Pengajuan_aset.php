<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_aset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Pengajuan_aset_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['pengajuan'] = $this->Pengajuan_aset_model->getAllAsetPengajuan();
		$datatitle['title'] = 'Asset Management | Pengajuan Aset';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Data-asset/Pengajuan-aset/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Pengajuan Aset | Tambah';

		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Kode Aset', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Pengajuan-aset/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan',true)),
			];
			$this->db->insert('pengajuan',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('pengajuan_aset');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['pengajuan'] = $this->Pengajuan_aset_model->getDataById($id);
		$datatitle['title'] = 'Pengajuan Aset | Edit';

		
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Kode Aset', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Pengajuan-aset/edit.php',$data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('pengajuan', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('pengajuan_aset');

	}
}

	public function hapus($id){
		$this->Pengajuan_aset_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('pengajuan_aset');
	}

	
}