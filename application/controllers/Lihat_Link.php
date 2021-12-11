<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_Link extends CI_Controller {
	public function u($id)
	{
        $this->load->model('link_model');
        $link_id['id'] = $id;
		$this->load->view('lihat_link', $link_id);
	}
}
