<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_aset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Satuan_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['satuan'] = $this->Satuan_model->getAllSatuan();
		$datatitle['title'] = 'Asset Management | Satuan Aset';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Data-asset/Satuan-aset/index', $data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Satuan Aset | Tambah';

		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Satuan-aset/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			$this->db->insert('satuan',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('satuan_aset');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['satuan'] = $this->Satuan_model->getDataById($id);
		$datatitle['title'] = 'Satuan Aset | Edit';

		$this->form_validation->set_rules('satuan', 'Nama Kategori', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('templates/sidebar.php',$data);
			$this->load->view('Admin/Data-asset/Satuan-aset/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'satuan' => htmlspecialchars($this->input->post('satuan',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('satuan', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('Satuan_aset');

	}
}

	public function hapus($id){
		$this->Satuan_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('Satuan_aset');
	}
}