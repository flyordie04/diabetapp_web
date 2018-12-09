<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');

		if($this -> input -> post('submit') != NULL) {
			$postData = $this->input->post();
			$this -> session -> set_userdata($postData['email']);
		}
		$this->load->view('login');
		$this->load->view('footer');
	}

}
