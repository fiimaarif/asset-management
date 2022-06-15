<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_keluar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Aset_keluar_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['aset_keluar'] = $this->Aset_keluar_model->getAllAsetKeluar();
		$datatitle['title'] = 'Asset Management | Aset Keluar';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Data-asset/Aset-keluar/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Aset Keluar | Tambah';

		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required|trim');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Aset-keluar/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'id_transaksi' => htmlspecialchars($this->input->post('id_transaksi',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'kode_aset' => htmlspecialchars($this->input->post('kode_aset',true)),
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'tujuan' => htmlspecialchars($this->input->post('tujuan',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			$this->db->insert('aset_keluar',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('aset_keluar');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['aset_keluar'] = $this->Aset_keluar_model->getDataById($id);
		$datatitle['title'] = 'Aset Keluar | Edit';

		
		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required|trim');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Aset-keluar/edit.php',$data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'id_transaksi' => htmlspecialchars($this->input->post('id_transaksi',true)),
				'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
				'kode_aset' => htmlspecialchars($this->input->post('kode_aset',true)),
				'nama_aset' => htmlspecialchars($this->input->post('nama_aset',true)),
				'tujuan' => htmlspecialchars($this->input->post('tujuan',true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('aset_keluar', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('aset_keluar');

	}
}

	public function hapus($id){
		$this->Aset_keluar_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('aset_keluar');
	}

	
}