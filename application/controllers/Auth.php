<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('pages/index');
		$this->load->view('template/footer');
	}
	public function diskusi()
	{
		$this->load->view('template/header');
		$this->load->view('pages/detaildiskusi.php');
		$this->load->view('template/footer');
	}
}
