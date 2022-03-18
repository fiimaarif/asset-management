<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Aset_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data2['aset'] = $this->Aset_model->getAllAset();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Data-asset/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('category', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('department', 'Department', 'required|trim');
		$this->form_validation->set_rules('location', 'Lokasi', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Data-asset/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'category' => htmlspecialchars($this->input->post('category',true)),
				'department' => htmlspecialchars($this->input->post('department',true)),
				'location' => htmlspecialchars($this->input->post('location',true)),
			];
			$this->db->insert('aset',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('aset');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['aset'] = $this->Aset_model->getDataById($id);

		
		$this->form_validation->set_rules('category', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('department', 'Department', 'required|trim');
		$this->form_validation->set_rules('location', 'Lokasi', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Data-asset/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'category' => htmlspecialchars($this->input->post('category',true)),
				'department' => htmlspecialchars($this->input->post('department',true)),
				'location' => htmlspecialchars($this->input->post('location',true)),
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