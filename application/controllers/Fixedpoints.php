<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixedpoints extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');		
		$this->load->model('fixedpoints_model', '', TRUE);
		$this->load->model('common_model', '', TRUE);
		

		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){
		$data['fixedpoints'] = $this->fixedpoints_model->getAllFixedpoints();
		//print_r($data['fixedpoints']);
		
		$this->load->view('common/header');
		$this->load->view('fixedpoints/list',$data);
		$this->load->view('common/footer');
	}

	public function addnew(){
		$data = array();

		$data['cities'] = $this->common_model->getAllCities();

		$this->load->view('common/header');
		$this->load->view('fixedpoints/add',$data);
		$this->load->view('common/footer');
	}

	

	public function edit($fixedpointsId){
		$data = array();
	
		$data['cities'] = $this->common_model->getAllCities();
		$data['fixedpoints'] = $this->fixedpoints_model->getFixedpointsById($fixedpointsId);
		//print_r($data['fixedpoints']);

		$this->load->view('common/header');
		$this->load->view('fixedpoints/edit',$data);
		$this->load->view('common/footer');
	}

	public function savenew(){
	
		$pointFrom = $this->input->post('pointc_from');
		$pointFromAddress = $this->input->post('point_faddress');
		$pointTo = $this->input->post('pointc_to');
		$pointToAddress = $this->input->post('point_taddress');
		$distance = $this->input->post('point_distance');
		$duration = $this->input->post('point_duration');
		
		$fixedpointId = $this->fixedpoints_model->saveNewFixedpoint($pointFrom, $pointFromAddress, $pointTo, $pointToAddress, $distance, $duration);
		
		$re =array();

		if($fixedpointId)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		
		if(!isset($re['error']) || $re['error'] == ''){
			$re = array("error"=>false,"message"=>"", "fixedpointId"=>$fixedpointId);
			$this->session->set_flashdata('successMsg', 'New Point has been saved');
		}else{
				$re = array("error"=>true,"message"=>"Error! please try again", "fixedpointId"=>0);
			$this->session->set_flashdata('errorMsg', 'Error! please try again');
		}	
		
		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function saveedit(){
		
		$fixedpointId = $this->input->post('fixedpointId');
		$pointFrom = $this->input->post('pointc_from');
		$pointFromAddress = $this->input->post('point_faddress');
		$pointTo = $this->input->post('pointc_to');
		$pointToAddress = $this->input->post('point_taddress');
		$distance = $this->input->post('point_distance');
		$duration = $this->input->post('point_duration');
		
		$re =array();

		$fixedpointsId = $this->fixedpoints_model->updateFixedpoint($fixedpointId, $pointFrom, $pointFromAddress, $pointTo, $pointToAddress, $distance, $duration);
					
		if($fixedpointsId)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		if(!isset($re['error']) || $re['error'] == ''){
			$re = array("error"=>false,"message"=>"Fixedpointss updated successfully");
			$this->session->set_flashdata('successMsg', 'Fixedpoint updated successfully');
		}else{
				$re = array("error"=>true,"message"=>"Error! please try again");
				$this->session->set_flashdata('errorMsg', 'Error! please try again');
		}	
		
		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	
	public function updateStatus(){
		
		$status = $this->input->post('status');
		$fixedpoints = $this->input->post('fixedpoints');
		
		
		$re =array();

		$fixedpointsId = $this->fixedpoints_model->updateFixedpointStatuses($status, $fixedpoints);
					
		if($fixedpointsId)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		if(!isset($re['error']) || $re['error'] == ''){
			$re = array("error"=>false,"message"=>"Fixedpoint(s) updated successfully");
		}else{
				$re = array("error"=>true,"message"=>"Error! please try again");
		}	
		
		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	
	public function delete(){
		
		$fixedpointId = $this->input->post('fixedpointId');
		$result = $this->fixedpoints_model->deleteFixedpoint($fixedpointId);
		
		
		if($result){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Fixed Point deleted.')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}
	}

	
	
	
}
