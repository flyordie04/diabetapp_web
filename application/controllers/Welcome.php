<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$classObj = new Users();
		//$auth = $classObj->getUser();

		$userEmail = $this -> input -> post('orderString');

		$this->load->view('header');
		$this->load->view('homepage',[
			'userEmail' => $userEmail
		]);
		$this->load->view('footer');
	}

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this -> load -> model('Users');
	}
}
