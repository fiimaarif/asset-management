<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('User_model');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data2['user'] = $this->User_model->getAllUser();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/User/index',$data2);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}
}