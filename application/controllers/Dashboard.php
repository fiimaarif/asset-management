<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// untuk user access agar tidak bisa masuk ke dashboard tanpa login
		is_logged_in();

		$this->load->model('Dashboard_model');
		$this->load->model('Aset_masuk_model');
		$this->load->model('Aset_keluar_model');
		$this->load->model('Pengajuan_aset_model');
	}

	public function admin_box(){
		$box = [
			
			[
				'box' 		=> 'info',
				'total' 	=> $this->Dashboard_model->total('user'),
				'title'		=> 'Users',
				'icon'		=> 'fas fa-users'
			],
			[
				'box' 		=> 'primary',
				'total' 	=> $this->Dashboard_model->total('aset'),
				'title'		=> 'Data Aset',
				'icon'		=> 'fas fa-folder'
			],
			[
				'box' 		=> 'success',
				'total' 	=> $this->Dashboard_model->total('aset_masuk'),
				'title'		=> 'Aset Masuk',
				'icon'		=> 'fas fa-file-download'
			],
			[
				'box' 		=> 'danger',
				'total' 	=> $this->Dashboard_model->total('aset_keluar'),
				'title'		=> 'Aset Keluar',
				'icon'		=> 'fas fa-folderfas fa-file-upload'
			],
			[
				'box' 		=> 'warning',
				'total' 	=> $this->Dashboard_model->total('location'),
				'title'		=> 'Lokasi Aset',
				'icon'		=> 'fas fa-map-marker-alt'
			],
			[
				'box' 		=> 'secondary',
				'total' 	=> $this->Dashboard_model->total('pengajuan'),
				'title'		=> 'Pengajuan Aset',
				'icon'		=> 'fas fa-file-signature'
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
		$this->load->view('templates/sidebar.php',$data);
		$this->load->view('Admin/Dashboard/index', $box);
		$this->load->view('templates/footer.php');
		$this->load->view('templates/script.php');
	}

}
