<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');		
		$this->load->database();

		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){	
		$this->load->view('common/header');
		$this->load->view('home/blankpage');
		$this->load->view('common/footer');
	}
}
