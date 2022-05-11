<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('User_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data2['user'] = $this->User_model->getAllUser();
		$datatitle['title'] = 'Asset Management | Admin';

		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/User/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}
	public function tambah(){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Admin | Tambah';

		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]',[
			'min_length' => 'Password terlalu pendek, min.6 karakter'
		]);
		$this->form_validation->set_rules('level', 'Level', 'required|trim');
		if($this->form_validation->run() === false) {
		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/User/tambah.php');
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
		
		}else{
			
			$data = [
				'fullname' => htmlspecialchars($this->input->post('fullname',true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'default.png',
				'level' => htmlspecialchars($this->input->post('level',true)),
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('user');

		}

	}
	public function edit($id = null){

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['user'] = $this->User_model->getDataById($id);
		$datatitle['title'] = 'Admin | Edit';

		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]',[
			'min_length' => 'Password terlalu pendek, min.6 karakter'
		]);
		if($this->form_validation->run() === false) {
			$this->load->view('templates/header.php',$datatitle);
			$this->load->view('templates/navbar.php',$data);
			$this->load->view('Admin/User/edit.php', $data);
			$this->load->view('templates/footer.php');
			$this->load->view('templates/script.php');
		}else{
			$data = [
				'fullname' => htmlspecialchars($this->input->post('fullname',true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'default.png',
				'level' => htmlspecialchars($this->input->post('level',true)),
			];
			
			$this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('user');

	}
}

	public function hapus($id){
		$this->User_model->hapusData($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('user');
	}
}
