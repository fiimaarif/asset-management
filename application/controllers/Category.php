<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Category_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data2['category'] = $this->Category_model->getAllCategory();
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Asset-category/index', $data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('category_code', 'Kode Kategori', 'required|trim|is_unique[category.category_code]');
		$this->form_validation->set_rules('category_name', 'Nama Kategori', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Asset-category/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'category_code' => htmlspecialchars($this->input->post('category_code',true)),
				'category_name' => htmlspecialchars($this->input->post('category_name',true)),
			];
			$this->db->insert('category',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('category');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['category'] = $this->Category_model->getDataById($id);

		$this->form_validation->set_rules('category_code', 'Kode Kategori', 'required|trim|is_unique[category.category_code]');
		$this->form_validation->set_rules('category_name', 'Nama Kategori', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Asset-category/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'category_code' => htmlspecialchars($this->input->post('category_code',true)),
				'category_name' => htmlspecialchars($this->input->post('category_name',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('category', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('category');

	}
}

	public function hapus($id){
		$this->Category_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('category');
	}
}