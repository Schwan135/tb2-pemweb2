<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('link_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('Profil_Model');
		$data['profil']=$this->Profil_Model->get_data();
		$this->load->view('profil', $data);
	}
}
