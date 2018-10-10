<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');		
		$this->load->model('settings_model', '', TRUE);

		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){
		$data = array();
		$data['settings'] = $this->settings_model->getSettings();
		
		$this->load->view('common/header');
		$this->load->view('settings/editsettings',$data);
		$this->load->view('common/footer');
	}

	

	public function saveedit(){
		$videoLink   = $this->input->post('videoLink');
		$faqLink     = $this->input->post('faqLink');
	
		$re        = array();

		
		$flag = $this->settings_model->updatesetting($videoLink, $faqLink);
		if($flag)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");
		
		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}
	

	
}
