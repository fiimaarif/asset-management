<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Aset_model');
		$this->load->model('Location_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['aset'] = $this->Aset_model->getAllAset();
		$datatitle['title'] = 'Asset Management | Data Aset';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Data-asset/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data2['alldata'] = $this->Aset_model->getAllData();
		$datatitle['title'] = 'Asset | Tambah';

		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required|trim');
		$this->form_validation->set_rules('kode_ruangan', 'Kode Ruangan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Data-asset/tambah.php',$data2);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang',true)),
				'kode_barang' => htmlspecialchars($this->input->post('kode_barang',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
				'kuantitas' => htmlspecialchars($this->input->post('kuantitas',true)),
				'kode_ruangan' => htmlspecialchars($this->input->post('kode_ruangan',true)),
			];
			$this->db->insert('aset',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('aset');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['aset'] = $this->Aset_model->getDataById($id);
		$datatitle['title'] = 'Asset | Edit';

		
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required|trim');
		$this->form_validation->set_rules('kode_ruangan', 'Kode Ruangan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Data-asset/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang',true)),
				'kode_barang' => htmlspecialchars($this->input->post('kode_barang',true)),
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
				'kuantitas' => htmlspecialchars($this->input->post('kuantitas',true)),
				'kode_ruangan' => htmlspecialchars($this->input->post('kode_ruangan',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('aset', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('aset');

	}
}

	public function hapus($id){
		$this->Aset_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('aset');
	}

	
}