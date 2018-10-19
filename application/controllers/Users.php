<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->helper(array('url','form'));		
		$this->load->model('users_model', '', TRUE);
		
		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){
		$data['users'] = $this->users_model->getAllusers();

		$this->load->view('common/header');
		$this->load->view('users/list',$data);
		$this->load->view('common/footer');
	}

	public function add(){
		$data               = array();
		$data['morphes']    = $this->morphe_model->getAllMorphes();
		$data['lifestyles'] = $this->lifestyle_model->getAllLifestyles();
		$data['plans']      = $this->plan_model->getAllPlans();
		$data['countries']  = $this->country_model->getAllCountries();
		$data['cities']     = $this->city_model->getCountryCities(111);

		$this->load->view('common/header');
		$this->load->view('users/add',$data);
		$this->load->view('common/footer');
	}

	public function savenew(){
		$username    = $this->input->post('username');
		$password    = $this->input->post('password');
		$email       = $this->input->post('email');
		$firstname   = $this->input->post('firstname');
		$lastname    = $this->input->post('lastname');
		$gender      = $this->input->post('gender','Male');
		$address     = $this->input->post('address');
		$country     = $this->input->post('country');
		$city        = $this->input->post('city');
		$dob         = $this->input->post('dob');
		$phonenumber = $this->input->post('phonenumber');
		$morphTypeId = $this->input->post('morphtype');
		$lifestyleId = $this->input->post('lifestyle');
		$planId      = $this->input->post('plan');

		if($this->users_model->usernameExists($username)){
			$re = array("error"=>true,"message"=>"Username already exists");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}

		if($this->users_model->emailExists($email)){
			$re = array("error"=>true,"message"=>"Email already exists");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}
		
		$result = $this->users_model->saveNew($username, $password, $email, $firstname, $lastname, $gender, $address, $country, $city, $dob, $phonenumber, $morphTypeId, $lifestyleId, $planId);

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function edit($userId){
		$year     = 2018;
		$month    = 04;

		$data               = array();
		$data['user']       = $this->users_model->getUser($userId);
		$data['photos']       = $this->users_model->getUserPhotos($userId);
		$data['diary']      = $this->users_model->userDiaryEntry($userId,$year,$month);
		$data['statistics'] = $this->users_model->userMonthlyStats($userId,$year,$month);
		$data['questions']  = $this->users_model->userQuestionaire($userId);
		$data['morphes']    = $this->morphe_model->getAllMorphes();
		$data['lifestyles'] = $this->lifestyle_model->getAllLifestyles();
		$data['plans']      = $this->plan_model->getAllPlans();
		$data['countries']  = $this->country_model->getAllCountries();
		$data['cities']     = $this->city_model->getCountryCities($data['user']->countryId);
		$data['year']       = $year;
		$data['month']      = $month;

		$data['ceilingHeaders']  = $this->ceilingHeaders;
		$data['physicalHeaders'] = $this->physicalHeaders;

		$this->load->view('common/header');
		$this->load->view('users/edit',$data);
		$this->load->view('common/footer');
	}

	public function saveedit(){
		$userId       = $this->input->post('userId');
		$email        = $this->input->post('email');
		$oldemail     = $this->input->post('oldemail');
		$name         = $this->input->post('name');
		$surname      = $this->input->post('surname');
		$gender       = $this->input->post('gender');
		$address      = $this->input->post('address');
		$countryId    = $this->input->post('countryId');
		$cityId       = $this->input->post('cityId');
		$birthDate    = $this->input->post('birthDate');
		$phone        = $this->input->post('phone');
		$morpheTypeId = $this->input->post('morpheTypeId');
		$lifestyleId  = $this->input->post('lifestyleTypeId');

		if($email != $oldemail && $this->users_model->emailExists($email)){
			$re = array("error"=>true,"message"=>"Email already exists");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}
		
		$gender = (in_array($gender, ['Male','Female','Others'])) ? $gender : 'Male';
		$result = $this->users_model->saveEdit($userId, $email, $name, $surname, $gender, $address, $countryId, $cityId, $birthDate, $phone, $morpheTypeId, $lifestyleId);

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function searchusers(){
		$query = $this->input->get('query','');
		$users = $this->users_model->searchUsers($query);
		$resp  = ['suggestions'=>$users];
		return $this->output->set_content_type('application/json')->set_output(json_encode($resp));
	}

	public function changepassword(){
		$userId   = $this->input->post('userId');
		$password = $this->input->post('password');
		$result   = $this->users_model->changePassword($userId, $password);

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function deleteuser(){
		$userId = $this->input->post('userId');
		$result = $this->users_model->deleteUser($userId);

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function statistics(){
		$userId             = $this->input->post('userId');
		$monthYear          = $this->input->post('month');
		list($month,$year)  = explode('-', $monthYear);
		$data               = array();
		$data['statistics'] = $this->users_model->userMonthlyStats($userId,$year,$month);		
		$data['year']       = $year;
		$data['month']      = $month;

		$data['ceilingHeaders']  = $this->ceilingHeaders;
		$data['physicalHeaders'] = $this->physicalHeaders;
		
		$this->load->view('users/statistics',$data);
	}

	public function diary(){
		$userId            = $this->input->post('userId');
		$monthYear         = $this->input->post('month');
		list($month,$year) = explode('-', $monthYear);
		$data              = array();
		$data['diary']     = $this->users_model->userDiaryEntry($userId,$year,$month);		
		$data['year']      = $year;
		$data['month']     = $month;

		$this->load->view('users/diary',$data);
	}

	public function statchart(){
		$userId   = $this->input->post('userId');
		$year     = $this->input->post('year');
		$chartCol = $this->input->post('chartColumn');

		$statData  = $this->users_model->userStatChartData($userId,$year,$chartCol);		
		$chartData = [];
		$labels    = [];

		foreach ($statData as $row) {
			$chartData[] = $row->column;
			$labels[]    = $row->montStr;
		}

		$data              = array();	
		$data['year']      = $year;
		$data['chartCol']  = $chartCol;
		$data['chartData'] = $chartData;
		$data['labels']    = $labels;
		$data['units']     = (count($statData) > 0) ? $statData[0]->units : '';

		$data['ceilingHeaders']  = $this->ceilingHeaders;
		$data['physicalHeaders'] = $this->physicalHeaders;
		
		$this->load->view('users/statchart',$data);
	}
}
