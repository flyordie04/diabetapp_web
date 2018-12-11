<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function index()
	{
		if($this->firebase->getCurrentUser())
		{
			show_error('Jesteś zalogowany');
		}

		if($this -> input -> post('submit') != NULL){
			$postData = $this->input->post();
			$status = $this->users->register($postData['email'],$postData['password'],$postData['first_name'],$postData['surname'],$postData['city'],$postData['place'],$postData['phone_number']);

			if($status['status']=='ok')
			{
				redirect('potwierdzenie');
			}
			else
			{
				var_dump($status);
			}

		}

		$this->load->view('header');
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
