<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->model('auth_model');

		$username = $this->input->post('email');
		$password = $this->input->post('password');

		if($this->auth_model->login($username, $password)){
			redirect('profil');
		} else {
			// $this->session->set_flashdata('message_login_error', 'Login gagal, pastikan username dan password benar!');
		}

		$this->load->view('login');
	}

	public function drop()
	{
		$this->load->model('auth_model');

		$this->auth_model->logout();
		redirect('http://localhost/tugas-besar-2/index.php/login');
	}

}
