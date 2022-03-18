<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Department_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data2['department'] = $this->Department_model->getAllDepartment();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Department/index', $data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('department_code', 'Kode Department', 'required|trim|is_unique[department.department_code]');
		$this->form_validation->set_rules('department_name', 'Nama Department', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Department/tambah.php');
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			
			$data = [
				'department_code' => htmlspecialchars($this->input->post('department_code',true)),
				'department_name' => htmlspecialchars($this->input->post('department_name',true)),
			];
			$this->db->insert('department',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('department');

	}
}
	

	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['department'] = $this->Department_model->getDataById($id);

		$this->form_validation->set_rules('department_code', 'Kode Department', 'required|trim|is_unique[department.department_code]');
		$this->form_validation->set_rules('department_name', 'Nama Department', 'required|trim');
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/Department/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'department_code' => htmlspecialchars($this->input->post('department_code',true)),
				'department_name' => htmlspecialchars($this->input->post('department_name',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('department', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('department');

	}
}

	public function hapus($id){
		$this->Department_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('department');
	}
}