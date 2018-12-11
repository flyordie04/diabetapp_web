<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		if($this->firebase->getCurrentUser()) //zalogowany
		{
			var_dump($this->firebase->getCurrentUser()->email);
		}
		else //neizalogowany
		{
			redirect(site_url('logowanie')); // wydaje mi sie ze lepiej tu przekierowac, no tak, al
		}

		/*
		 * TYLO? Tak, resztę sobie raczej poradzę, teraz w modelu zrobić funkcje pobierające i przekazywać im tego emaila? a co chcesz pobierac? pokaże
		 */

		$classObj = new Users();
		//$userEmail = $classObj -> getUser();

		$this->load->library('session');
		$userEmail = $this -> session ->userdata('email');
		echo $userEmail;

		$this->load->view('header');

		$this->load->view('homepage', [
			//'userEmail' => $userEmail
		]);
		$this->load->view('footer');
		//$userEmail = $this -> input ->get('currentUser');
		//$userEmail = $_GET['currentUser'];
		//echo $userEmail;
		echo $this -> input -> post('currentUser');
		echo "dupa";
	}

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this -> load -> model('Users');
	}
}
