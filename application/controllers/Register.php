<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function index()
	{
		if($this -> input -> post('submit') != NULL){
			$postData = $this->input->post();
			$classObj = new Users();
			$classObj->insert($postData['email'],$postData['first_name'],$postData['surname'],$postData['city'],$postData['place'],$postData['phone_number']);
			$postData = null;
			redirect('potwierdzenie');
		}

		$this->load->view('register');
		$this->load->view('footer');
	}

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this -> load -> model('Users');
	}

}
