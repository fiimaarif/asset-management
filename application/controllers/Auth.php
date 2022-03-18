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
		$this->form_validation->set_rules('email', 'Email','required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password','required|trim');
		if($this->form_validation->run()=== false){
			$this->load->view('Auth/index.php');
		}else{
			$this->_loginSuccess();
		}
	}

	private function _loginSuccess(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		// Jika usernya ada
		if($user){
			// Jika usernya aktif
			if($user['is_active'] == 1){
				// cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Berhasil Login
						</div>');
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Berhasil Login
						</div>');
						redirect('member');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Password!
					</div>');
					redirect('auth/login');
				}

			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			This email has not been activated!
			</div>');
			redirect('auth/login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!
			</div>');
			redirect('auth/login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name','Full Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar, coba yang lain !'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password tidak sesuai',
			'min_length' => 'Password terlalu pendek, min.6 karakter'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if($this->form_validation->run()=== false){
			$this->load->view('Auth/index.php');
		}else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => 1,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please Login
			</div>');
			redirect('auth/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('auth/login');
	}
}
