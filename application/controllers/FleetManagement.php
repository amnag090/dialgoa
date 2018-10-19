<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FleetManagement extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->helper(array('url','form'));		

		$this->load->model('common_model', '', TRUE);
		$this->load->model('vehicles_model', '', TRUE);
		
		//if(!$this->session->userdata('admin'))
		//	redirect('login');
	}

	public function index(){
		$data = array();
		$data['list'] = $this->vehicles_model->getVehicleList();
		$this->load->view('common/header',$data);
		$this->load->view('fleetmanagement/list',$data);
		$this->load->view('common/footer',$data);
	}

	public function add(){
		$data = array();
		$data['vehicleTypes'] = $this->common_model->getOptionsForSelectList('vehicle_types');
		$this->load->view('common/header',$data);
		$this->load->view('fleetmanagement/add',$data);
		$this->load->view('common/footer',$data);
	}

	public function edit($vehicle_id){
		$data = array();
		$data['vehicle'] =$this->vehicles_model->getVehicleById($vehicle_id);
		$data['vehicleTypes'] = $this->common_model->getOptionsForSelectList('vehicle_types');
		$this->load->view('common/header',$data);
		$this->load->view('fleetmanagement/edit',$data);
		$this->load->view('common/footer',$data);		
	}

	public function save(){
		$this->load->library('form_validation');

		log_message('debug', $_FILES);
		$this->form_validation->set_rules('owner_name','Owner name','regex_match[/^([-a-z_ ])+$/i]');
        $this->form_validation->set_rules('registration_no','Registration number','alpha_numeric');
        $this->form_validation->set_rules('registration_office','Registration Office','alpha');
        $this->form_validation->set_rules('manufacture_company','Manufacture name','alpha_numeric_spaces');
        $this->form_validation->set_rules('vehicle_name','Vehicle name','alpha_numeric');
        $this->form_validation->set_rules('chassis_no','Chassis Number','alpha_numeric');
        
		if ($this->form_validation->run() == FALSE)
                {
					return $this->output->set_content_type('application/json')
										->set_output(json_encode(array('error' => true,'message'=>validation_errors())));
                }
                else
                {
					$registration_no = $this->input->post('registration_no');
					$manufacture_date = date_create_from_format("d/m/Y",$this->input->post('manufacture_date'))->format('Y-m-d');
					$manufacture_company = $this->input->post('manufacture_company');
					$vehicle_id = $this->input->post('vehicle_id');
					$chassis_no = $this->input->post('chassis_no');
					$owner_name = $this->input->post('owner_name');
					$vehicle_name = $this->input->post('vehicle_name');
					$seating_capacity = $this->input->post('seating_capacity');
					$registration_office = $this->input->post('registration_office');
					$selfdrive = $this->input->post('selfdrive');
					$ac = $this->input->post('ac');
					$carrier = $this->input->post('carrier');
					$vacinity = $this->input->post('vacinity');
					$fuel_type= $this->input->post('fuel_type');
		
					$vehicle = array(
						'vendor_admin_id' => $this->input->post('vendor_admin_id'),
						'registration_no' => $registration_no,
						'owner_name' => $owner_name,
						'manufacture_date' => $manufacture_date,
						'manufacture_company' => $manufacture_company,
						'name' =>$vehicle_name,
						'chassis_no' =>$chassis_no,
						'seating_capacity'=> $seating_capacity,
						'registration_office' => $registration_office,
						'vehicle_type' => $vehicle_id,
						'vacinity' => $vacinity,
						'ac' => $ac,
						'carrier' => $carrier,
						'self_drive' => $selfdrive,
						'fuel_type' => $fuel_type,
						'status' => 1,
					);

					$vehicle_id = $this->vehicles_model->addVehicle($vehicle);				
					if($vehicle_id){
						return $this->output->set_content_type('application/json')
											->set_output(json_encode(array('error' => false,'message'=>'New Vehicle Added To Fleet.')));
					} else {
						return $this->output->set_content_type('application/json')
											->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
					}
            }		
	}

	public function delete(){
		$fleetId= $this->input->post('fleetId');
		if($this->vehicles_model->deleteVehicle($fleetId))
		{
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Vehicle deleted')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}
	}

	public function saveedit(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('owner_name','Owner name','regex_match[/^([-a-z_ ])+$/i]');
        $this->form_validation->set_rules('registration_no','Registration number','alpha_numeric');
        $this->form_validation->set_rules('registration_office','Registration Office','alpha');
        $this->form_validation->set_rules('manufacture_company','Manufacture name','alpha_numeric_spaces');
        $this->form_validation->set_rules('vehicle_name','Vehicle name','alpha_numeric');
        $this->form_validation->set_rules('chassis_no','Chassis Number','alpha_numeric');
        
		if ($this->form_validation->run() == FALSE)
		{
			return $this->output->set_content_type('application/json')
			->set_output(json_encode(array('error' => true,'message'=>validation_errors())));
		}
		else
		{

		$registration_no = $this->input->post('registration_no');
		$manufacture_date = date_create_from_format("d/m/Y",$this->input->post('manufacture_date'))->format('Y-m-d');
		$manufacture_company = $this->input->post('manufacture_company');
		$vehicle_type = $this->input->post('vehicle_type');
		$chassis_no = $this->input->post('chassis_no');
		$owner_name = $this->input->post('owner_name');
		$vehicle_name = $this->input->post('vehicle_name');
		$seating_capacity = $this->input->post('seating_capacity');
		$registration_office = $this->input->post('registration_office');
		$selfdrive = $this->input->post('selfdrive');
		$ac = $this->input->post('ac');
		$carrier = $this->input->post('carrier');
		$vacinity = $this->input->post('vacinity');
		$fuel_type= $this->input->post('fuel_type');
		$vehicle_id=$this->input->post('vehicle_id');
		$vehicle = array(
			'vendor_admin_id' => $this->input->post('vendor_admin_id'),
			'registration_no' => $registration_no,
			'owner_name' => $owner_name,
			'manufacture_date' => $manufacture_date,
			'manufacture_company' => $manufacture_company,
			'name' =>$vehicle_name,
			'chassis_no' =>$chassis_no,
			'seating_capacity'=> $seating_capacity,
			'registration_office' => $registration_office,
			'vehicle_type' => $vehicle_type,
			'vacinity' => $vacinity,
			'ac' => $ac,
			'carrier' => $carrier,
			'self_drive' => $selfdrive,
			'fuel_type' => $fuel_type,
			'status' => 1,
			);
			
			if($this->vehicles_model->updateVehicle($vehicle,$vehicle_id)){
				return $this->output->set_content_type('application/json')
									->set_output(json_encode(array('error' => false,'message'=>'Vehicle updated.')));
			} else {
				return $this->output->set_content_type('application/json')
									->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
			}
		}
	} 

public function updateStatus(){
	$status = $this->input->post('status');
	$fleetIds = $this->input->post('fleet');
	if(count($fleetIds) >0 && in_array($status,array('1','0'))){
		// call update function in the model
		if( $this->vehicles_model->updateVehicleStatus($status,$fleetIds)){
			return $this->output->set_content_type('application/json')
				->set_output(json_encode(array(
						'error' => false,
						'message'=>'Vehicle status updated'
		)));
		}
		else {
			return $this->output->set_content_type('application/json')
					->set_output(json_encode(array(
							'error' => false,
							'message'=>' Sorry! There was a databse error'
					)));
			}
		}
			else {
				return $this->output->set_content_type('application/json')
									->set_output(json_encode(array(
										'error' => false,
										'message'=>'There was some issue. Retry Later'
									)));

			}

	
}
	/* public function statuschange(){
		$fares  = $this->input->post('fares');
		$action = strtolower(trim($this->input->post('action')));

		if(count($fares) > 0 && in_array($action, array('activate','deactivate'))){
			$res = $this->fare_model->updateStatus($action,$fares);

			if($res){
				return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => false,
                    				'message'=>'fares updated successfully'
                    			)));
			} else {
				return $this->output->set_content_type('application/json')
								->set_output(json_encode(array(
                    				'error' => true,
                    				'message'=>'fares not updated'
                    			)));
			}
		} else {
			return $this->output->set_content_type('application/json')
							->set_output(json_encode(array(
                				'error' => true,
                				'message'=>'no fares or action selected'
                			)));
		}
	} */
}