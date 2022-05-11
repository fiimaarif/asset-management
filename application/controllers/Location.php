<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Location_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['location'] = $this->Location_model->getAllLocation();
		$datatitle['title'] = 'Asset Management | Location';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Asset-location/index', $data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Asset Location | Tambah';

		$this->form_validation->set_rules('location_code', 'Kode Kategori', 'required|trim|is_unique[location.location_code]');
		$this->form_validation->set_rules('location_name', 'Nama Kategori', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Asset-location/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'location_code' => htmlspecialchars($this->input->post('location_code',true)),
				'location_name' => htmlspecialchars($this->input->post('location_name',true)),
			];
			$this->db->insert('location',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('location');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['location'] = $this->Location_model->getDataById($id);
		$datatitle['title'] = 'Asset Location | Edit';

		$this->form_validation->set_rules('location_code', 'Kode Kategori', 'required|trim');
		$this->form_validation->set_rules('location_name', 'Nama Kategori', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Asset-location/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'location_code' => htmlspecialchars($this->input->post('location_code',true)),
				'location_name' => htmlspecialchars($this->input->post('location_name',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('location', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('location');

	}
}

	public function hapus($id){
		$this->Location_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('location');
	}
}