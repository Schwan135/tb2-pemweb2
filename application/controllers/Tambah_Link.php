<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_Link extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model');
		$this->load->model('auth_model');
		$this->load->model('link_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data['profil']=$this->profil_model->get_data();
		$this->load->view('tambah_link', $data);
	}

	public function add()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$url = $this->input->post('url');
		$email = $this->input->post('email');
		$data = array(
			'id' => $id,
			'nama' => $nama,
			'url' => $url,
			'email' => $email,
			'pin' => ""
		);
		$this->link_model->tambah_link($data);
		redirect('http://localhost/tugas-besar-2/index.php/tambah_link');
	}
}
