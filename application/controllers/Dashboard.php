<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Dashboard_model');
	}

	public function admin_box(){
		$box = [
			
			[
				'box' 		=> 'info',
				'total' 	=> $this->Dashboard_model->total('user'),
				'title'		=> 'Admin',
				'icon'		=> 'fas fa-users'
			],
			[
				'box' 		=> 'warning',
				'total' 	=> $this->Dashboard_model->total('location'),
				'title'		=> 'Asset Location',
				'icon'		=> 'fas fa-folder-plus'
			],
			[
				'box' 		=> 'danger',
				'total' 	=> $this->Dashboard_model->total('aset'),
				'title'		=> 'Data Asset',
				'icon'		=> 'fas fa-folder'
			],
		];
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$datatitle['title'] = 'Asset Management | Dashboard';
		$box['info_box'] = $this->admin_box();
		$this->load->view('templates/header.php',$datatitle);
		$this->load->view('templates/navbar.php',$data);
		$this->load->view('Admin/Dashboard/index', $box);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

}
