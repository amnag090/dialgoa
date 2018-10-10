<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url','cookie'));
		$this->load->model('login_model', '', TRUE);
	}

	public function index(){
		//$iilllIIILILIL      = $this->login_model->checkBlock();

		//if($iilllIIILILIL == 4){
		//	redirect('login/blocked');
		//	die;
		//}
		#if already logged in send home
		if($this->session->userdata('admin'))
			redirect('home');

		#if cookie is set do cookie login
		if(($this->input->cookie('mcba_adminid'))){
			$adminId = $this->input->cookie('mcba_adminid');
			$admin   = $this->login_model->cookieLogin($adminId);
			$this->session->set_userdata(array('admin'=>$admin));
			redirect('home');
		}

		$this->load->view('login/login');
	}

	public function logincheck(){
		

		$email      = $this->input->post('email');
		$password   = $this->input->post('password');
		$remember   = $this->input->post('remember');
		$admin      = $this->login_model->loginCheck($email,$password);

		if($admin===false){
			$re = array("error"=>true,"message"=>"Invalid email and/or password");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		} else {			
			
			if($remember=='1')
				$this->input->set_cookie('mcba_adminid',$admin->id,525600);
			
			$this->session->set_userdata(array('admin'=>$admin));
			$re = array("error"=>false,"message"=>"","admin"=>$admin);
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}
	}

	public function forgotpassword(){
		$this->load->view('login/forgot_password');
	}

	public function resetpass(){
		$email = $this->input->post('forgotemail');
		$resp  = $this->login_model->resetForgotPassword($email);

		if($resp)
			$re = array("error"=>true,"message"=>"");
		else
			$re = array("error"=>false,"message"=>"");		

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function logout(){
		delete_cookie('mcba_adminid');
		$this->session->sess_destroy();

		$this->session->set_userdata('');

		redirect('login');
	}
	

	public function generatePassword(){
		$this->login_model->generatePassword($email);
	}
	public function blocked(){
		$this->load->view('login/blocked');
	}

	public function block(){
		$this->login_model->block();
		
	}
}
