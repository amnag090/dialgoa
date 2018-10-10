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
/*
	public function edit($fareId){
		$data = array();

		$data['fixedPtFare']  = $this->fare_model->getFixedPointFare($fareId);
		$data['fixedPoints']  = $this->fixedpoints_model->getActiveFixedPoints();
		$data['vehicleTypes'] = $this->common_model->getOptionsForSelectList('vehicle_types');

		$this->load->view('common/header',$data);
		$this->load->view('fixedpointfare/edit',$data);
		$this->load->view('common/footer',$data);
	}
*/
	public function save(){
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

	public function delete(){
		die('delete');
	}
/*
	public function saveedit(){
		$fareId      = $this->input->post('fare_id');
		$routeId     = $this->input->post('point_id');
		$startDate   = date_create_from_format("d/m/Y",$this->input->post('start_date'))->format('Y-m-d');
		$endDate     = date_create_from_format("d/m/Y",$this->input->post('end_date'))->format('Y-m-d');
		$vehicleType = $this->input->post('vehicle_id');
		$days        = $this->input->post('fare_days');
		$startTime   = $this->input->post('fixedp_start_time');
		$endTime     = $this->input->post('fixedp_end_time');
		$onewayAc    = floatval($this->input->post('ac_one'));
		$onewayNonAc = floatval($this->input->post('non_ac_one'));
		$roundAc     = floatval($this->input->post('ac_round'));
		$roundNonAc  = floatval($this->input->post('non_ac_round'));

		if(strtotime($endDate) < strtotime($startDate)){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Start date cannot be greater than the end date')));
			exit;
		}

		$rules     = array(
						'route_id'     => $routeId,
						'vehicle_type' => $vehicleType,
						'start_date'   => $startDate,
						'end_date'     => $endDate,
						'start_time'   => $startTime,
						'end_time'     => $endTime,
						'days'         => $days
					 );
		$oneWay    = array(
						'ac'     => $onewayAc,
						'non_ac' => $onewayNonAc
					 );
		$roundTrip = array(
						'ac'     => $roundAc,
						'non_ac' => $roundNonAc
					 );
		$result    = $this->fare_model->updatedFixedPointFare($fareId,$rules,$oneWay,$roundTrip);

		if($result){
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => false,'message'=>'Fare updated.')));
		} else {
			return $this->output->set_content_type('application/json')
								->set_output(json_encode(array('error' => true,'message'=>'Error! Please try again.')));
		}
	} */

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