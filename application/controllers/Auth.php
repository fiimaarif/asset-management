<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function login()
	{
		$this->form_validation->set_rules('username', 'Username','required|trim');
		$this->form_validation->set_rules('password', 'Password','required|trim');
		if($this->form_validation->run()=== false){
			$this->load->view('Auth/login.php');
		}else{
			$this->_loginSuccess();
		}
	}

	private function _loginSuccess(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		// Jika usernya ada
		if($user){
				// cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'username' => $user['username'],
						'level' => $user['level'],
					];
					$this->session->set_userdata($data);
					if($user['level'] == 'admin'){
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Berhasil Login
						</div>');
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Berhasil Login
						</div>');
						redirect('dashboard');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password salah!
					</div>');
					redirect('auth/login');
				}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username tidak terdaftar
			</div>');
			redirect('auth/login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]', [
			'is_unique' => 'Username sudah terdaftar, coba yang lain !'
		]);
		$this->form_validation->set_rules('fullname','Full Name','required|trim');
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password tidak sesuai',
			'min_length' => 'Password terlalu pendek, min.6 karakter'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if($this->form_validation->run()=== false){
			$this->load->view('Auth/register.php');
		}else{
			$data = [
				'username' => htmlspecialchars($this->input->post('username',true)),
				'fullname' => htmlspecialchars($this->input->post('fullname',true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'level' => 'admin'
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil Mendaftar,Silahkan Login
			</div>');
			redirect('auth/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		redirect('auth/login');
	}
}
