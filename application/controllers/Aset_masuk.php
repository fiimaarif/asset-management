<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Aset_masuk_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['aset_masuk'] = $this->Aset_masuk_model->getAllAsetMasuk();
		$datatitle['title'] = 'Asset Management | Aset Masuk';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Data-asset/Aset-masuk/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Asset Masuk | Tambah';

		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required|trim');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Aset-masuk/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'id_transaksi' => htmlspecialchars($this->input->post('id_transaksi',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'kode_aset' => htmlspecialchars($this->input->post('kode_aset',true)),
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'pengirim' => htmlspecialchars($this->input->post('pengirim',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			$this->db->insert('aset_masuk',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('aset_masuk');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['aset_masuk'] = $this->Aset_masuk_model->getDataById($id);
		$datatitle['title'] = 'Asset | Edit';

		
		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required|trim');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Aset-masuk/edit.php',$data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'id_transaksi' => htmlspecialchars($this->input->post('id_transaksi',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'kode_aset' => htmlspecialchars($this->input->post('kode_aset',true)),
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'pengirim' => htmlspecialchars($this->input->post('pengirim',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('aset_masuk', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('aset_masuk');

	}
}

	public function hapus($id){
		$this->Aset_masuk_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('aset_masuk');
	}

	
}