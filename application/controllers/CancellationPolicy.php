<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CancellationPolicy extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->helper(array('url','form'));		

		$this->load->model('common_model', '', TRUE);
		$this->load->model('cancellation_model', '', TRUE);
		
		//if(!$this->session->userdata('admin'))
		//	redirect('login');
	}

	public function index(){
		$data = array();
		$data['canPolicies'] = $this->cancellation_model->policyList();
		$data['between']     = 0;

		foreach ($data['canPolicies'] as $p) {
			if($p->and > $data['between']){
				$data['between'] = $p->and;
			}
		}

		$this->load->view('common/header',$data);
		$this->load->view('cancellationpolicy/list',$data);
		$this->load->view('common/footer',$data);
	}

	public function savenew(){
		$between  = intval($this->input->post('cancel_from'));
		$and      = intval($this->input->post('cancel_to'));
		$charge   = floatval($this->input->post('cancel_charges'));
		$canPolId = $this->cancellation_model->insert($between,$and,$charge);

		if($canPolId){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Cancellation Policy added.')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}
	}

	public function delete(){
		$policyId = $this->input->post('policyId');
		$result   = $this->cancellation_model->deletePolicy($policyId);
		
		if($result){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Cancellation Policy deleted.')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}
	}

	public function edit($policyId){
		$data = array();
		$data['policy'] = $this->cancellation_model->getCancellationPolicy($policyId);

		$this->load->view('common/header',$data);
		$this->load->view('cancellationpolicy/edit',$data);
		$this->load->view('common/footer',$data);

	}

	public function update(){
		$policyId = intval($this->input->post('policy_id'));
		$charge   = floatval($this->input->post('cancel_charges'));
		$result   = $this->cancellation_model->updateCancellationCharge($policyId, $charge);
		
		if($result){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Cancellation Policy updated.')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}

	}

	/*
	public function doregister(){
		$name         = $this->input->post('reg_business_name');
		$license      = $this->input->post('reg_license_num');
		$owner        = $this->input->post('reg_owner_name');
		$email        = $this->input->post('reg_email');
		$businessType = $this->input->post('reg_company_type');
		$referalType  = $this->input->post('reg_referral_field');
		$address      = $this->input->post('reg_address');
		$phone1       = $this->input->post('reg_primary_num');
		$phone2       = $this->input->post('reg_secondary_num');

		//$taxi = $this->input->post('taxi');
		//$taxi = $this->input->post('self_drive');

		if($this->vendor_model->isEmailRegistered($email)){
			//email alrerady registered
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => true,
                    				'message'=>'Email already registered'
                    			)));

		} else {
			$vendor   = array(
					'name'=>$name,
					'license_number'=>$license,
					'owner_name'=>$owner,
					'email'=>$email,
					'business_type'=>$businessType,
					'referal_type'=>$referalType,
					'address'=>$address,
					'phone1'=>$phone1,
					'phone2'=>$phone2,
					'status'=>1
				 );
			$vendorId = $this->vendor_model->saveVendor($vendor);

			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => false,
                    				'message'=>'Vendor registration successful'
                    			)));
		}
	}


	public function approval(){
		$data = array();

		$data['vendors'] = $this->vendor_model->Vendors();
		$this->load->view('common/header',$data);
		$this->load->view('vendor/approval',$data);
		$this->load->view('common/footer',$data);
	}

	public function edit($vendorId){
		$data = array();

		$data['vendor']   = $this->vendor_model->getVendor($vendorId);
		$data['busTypes'] = $this->common_model->getOptionsForSelectList('business_types');
		$data['referals'] = $this->common_model->getOptionsForSelectList('referals');

		$this->load->view('common/header',$data);
		$this->load->view('vendor/edit',$data);
		$this->load->view('common/footer',$data);
	}

	public function update(){
		$name         = $this->input->post('reg_business_name');
		$license      = $this->input->post('reg_license_num');
		$owner        = $this->input->post('reg_owner_name');
		$email        = $this->input->post('reg_email');
		$businessType = $this->input->post('reg_company_type');
		$referalType  = $this->input->post('reg_referral_field');
		$address      = $this->input->post('reg_address');
		$phone1       = $this->input->post('reg_primary_num');
		$phone2       = $this->input->post('reg_secondary_num');
		$vendorId     = $this->input->post('reg_vendor_id');

		//$taxi = $this->input->post('taxi');
		//$taxi = $this->input->post('self_drive');

		$vendor   = array(
					'name'=>$name,
					'license_number'=>$license,
					'owner_name'=>$owner,
					'email'=>$email,
					'business_type'=>$businessType,
					'referal_type'=>$referalType,
					'address'=>$address,
					'phone1'=>$phone1,
					'phone2'=>$phone2,
					'status'=>1
				 );
		$result   = $this->vendor_model->updateVendor($vendor,$vendorId);

		
		if($result){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => false,
                    				'message'=>'Vendor updated'
                    			)));
        } else {
        	return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => true,
                    				'message'=>'Error, Please try again'
                    			)));
        }
	}

	public function statuschange(){
		$vendors = $this->input->post('vendors');
		$action  = strtolower(trim($this->input->post('action')));

		if(count($vendors) > 0 && in_array($action, array('approved','rejected'))){
			$res = $this->vendor_model->updateStatus($action,$vendors);

			if($res){
				return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => false,
                    				'message'=>'vendors updated successfully'
                    			)));
			} else {
				return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => true,
                    				'message'=>'vendors not updated'
                    			)));
			}
		} else {
			return $this->output->set_content_type('application/json')
							->set_output(json_encode(array(
                				'error' => true,
                				'message'=>'no vendors or action selected'
                			)));
		}
	}
	*/
}
