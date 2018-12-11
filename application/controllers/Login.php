<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');

		if($this->firebase->getCurrentUser())
		{
			show_error('Jesteś zalogowany');
		}

		if(isset($_GET['wyloguj']))
		{
			unset($_SESSION['userToken']);
			redirect(site_url(uri_string()));
		}

		if($this->input->post('userToken') != null)
		{
			$_SESSION['userToken'] = $this->input->post('userToken');
			return;
		}

		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

}
