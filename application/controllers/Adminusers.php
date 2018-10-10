<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url','form'));		
		$this->load->model('users_model', '', TRUE);
		// $this->load->model('morphe_model', '', TRUE);
		// $this->load->model('lifestyle_model', '', TRUE);
		// $this->load->model('plan_model', '', TRUE);
		// $this->load->model('country_model', '', TRUE);
		// $this->load->model('city_model', '', TRUE);

		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){
		$data['adminusers'] = $this->users_model->getAllAdminUsers();

		$this->load->view('common/header');
		$this->load->view('adminusers/list',$data);
		$this->load->view('common/footer');
	}

	public function delete(){
		$userId = $this->input->post('userId');
		$result = $this->users_model->removeAdmin($userId);
		

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function add(){
		$userId = $this->input->post('userId');
		$result = $this->users_model->AddAsAdminAdmin($userId);
		

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}
}