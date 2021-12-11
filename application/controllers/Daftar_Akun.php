<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_Akun extends CI_Controller {
	public function index()
	{
		$this->load->view('daftar_akun');
	}
}
