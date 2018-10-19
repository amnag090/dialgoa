<?php
class Users_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function getAllusers(){
		$this->db->select('id, CONCAT(firstName," ", lastName) as name, email, aboutMe, profilePic, isActive, createdAt, updatedAt');
		$this->db->from('app_users');

		$this->db->where('deletedAt',null);
		$this->db->where('password !=','');
		$this->db->order_by('id');
		$result = $this->db->get()->result_array();
		$outArr = array();
		foreach ($result as $row){
			$outArr[] = $row;
		}

		return $outArr;
	}
	
	public function getAllAdminUsers(){
		$this->db->select('id, name, surname, username, email, phone, age, isActive, createdAt, updatedAt');
		$this->db->from('app_users');

		$this->db->where('deletedAt',null);
		$this->db->where('userType','Admin');
		$this->db->order_by('name');
		$result = $this->db->get()->result_array();
		$outArr = array();
		foreach ($result as $row){
			$outArr[] = $row;
		}

		return $outArr;
	}

	public function getUser($userId){
		$this->db->select('app_users.id,app_users.userType,app_users.planId,app_users.username,app_users.password,app_users.name,app_users.surname,app_users.phone,app_users.email,app_users.birthDate,app_users.age')
				 ->select('app_users.gender,app_users.address,app_users.countryId,app_users.cityId,app_users.morpheTypeId,app_users.lifestyleTypeId,app_users.profilePic,app_users.points,app_users.isActive,app_users.createdAt')
				 ->select('app_plans.name AS planName, app_morpheTypes.name AS morpheType, app_lifestyleTypes.name AS lifestyleType')
				 ->from('app_users')
				 ->join('app_plans','app_users.planId=app_plans.id','left')
				 ->join('app_morpheTypes','app_morpheTypes.id=app_users.morpheTypeId','left')
				 ->join('app_lifestyleTypes','app_lifestyleTypes.id=app_users.lifestyleTypeId','left')


				 ->where('app_users.id',$userId)
				 ->where('app_users.deletedAt',null)
				 ->limit(1);
		$result = $this->db->get()->row();

		return $result;
	}

	public function usernameExists($username){
		$count = $this->db->select('id')
					   ->from('app_users')
					   ->where('deletedAt',null)
					   ->where('username',$username)
					   ->count_all_results();

		return ($count > 0) ? true : false;
	}

	public function emailExists($email){
		$count = $this->db->select('id')
					   ->from('app_users')
					   ->where('deletedAt',null)
					   ->where('email',$email)
					   ->count_all_results();

		return ($count > 0) ? true : false;
	}

	public function saveNew($username, $password, $email, $firstname, $lastname, $gender, $address, $countryId, $cityId, $dob, $phonenumber, $morpheTypeId, $lifestyleTypeId, $planId){
		$dobObj = DateTime::createFromFormat('d/m/Y', $dob);
		$age    = $dobObj->diff(new DateTime('today'))->y;
		
		$this->db->set('userType', 'User')
				 ->set('planId', $planId)
				 ->set('username', $username)
				 ->set('password', password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]))
				 ->set('name', $firstname)
				 ->set('surname', $lastname)
				 ->set('phone', $phonenumber)
				 ->set('email', $email)
				 ->set('birthDate', $dobObj->format('Y-m-d'))
				 ->set('age', $age)
				 ->set('gender', $gender)
				 ->set('address', $address)
				 ->set('countryId', $countryId)
				 ->set('cityId', $cityId)
				 ->set('morpheTypeId', $morpheTypeId)
				 ->set('lifestyleTypeId', $lifestyleTypeId)
				 ->set('isActive', 1)
				 ->set('createdAt', date("Y-m-d H:i:s"));
		
		$res  = $this->db->insert('app_users');

		return $res;
	}

	public function saveEdit($userId, $email, $name, $surname, $gender, $address, $countryId, $cityId, $dob, $phone, $morpheTypeId, $lifestyleTypeId){
		$dobObj = DateTime::createFromFormat('d/m/Y', $dob);
		$age    = $dobObj->diff(new DateTime('today'))->y;
		
		return $this->db->set('name', $name)
						->set('surname', $surname)
						->set('phone', $phone)
						->set('email', $email)
						->set('birthDate', $dobObj->format('Y-m-d'))
						->set('age', $age)
						->set('gender', $gender)
						->set('address', $address)
						->set('countryId', $countryId)
						->set('cityId', $cityId)
						->set('morpheTypeId', $morpheTypeId)
						->set('lifestyleTypeId', $lifestyleTypeId)
						->set('isActive', 1)
						->set('updatedAt', date("Y-m-d H:i:s"))
						->where('id',$userId)
						->update('app_users');
	}

	public function changePassword($userId, $password){
		return $this->db->set('password', password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]))
				 ->set('updatedAt', date("Y-m-d H:i:s"))
				 ->where('id',$userId)
				 ->update('app_users');
	}

	public function deleteUser($userId){
		return $this->db->set('deletedAt', date("Y-m-d H:i:s"))
				 ->where('id',$userId)
				 ->update('app_users');
	}

	public function removeAdmin($userId){
		$res = $this->db->set('userType', 'User')
				 ->set('updatedAt', date("Y-m-d H:i:s"))
				 ->where('id',$userId)
				 ->update('app_users');

		return $res;
	}

	public function AddAsAdminAdmin($userId){
		$res = $this->db->set('userType', 'Admin')
				 ->set('updatedAt', date("Y-m-d H:i:s"))
				 ->where('id',$userId)
				 ->update('app_users');

		return $res;
	}

	public function searchUsers($query){
		return  $this->db->select("id, username, name, surname, CONCAT(name,' ',surname) AS value, id AS label, email, phone")
				->from('app_users')
				->where('deletedAt',null)
				->where('isActive',1)
				->where('userType','User')
				->group_start()
				->like("CONCAT(name,' ',surname)", $query, 'after')
    			->or_like('username', $query, 'after')
    			->or_like('email', $query, 'after')
				->group_end()
				->order_by('value')
				->order_by('username')
				->get()
				->result_array();
	}

	public function userQuestionaire($userId){
		$res = $this->db->select("app_questionaire.id, app_questionaire.question, app_questionaire.type, app_questionaire.sortOrder, app_questionaire.createdAt, app_questionaire.updatedAt, IFNULL(app_userQuestionaire.answer,'<span class=\"quest-not-answered\">Not Answered</span>') AS answer")
						->from('app_questionaire')
						->join('app_users','app_users.lifestyleTypeId=app_questionaire.lifestyleTypeId')
						->join('app_userQuestionaire','app_userQuestionaire.questionId=app_questionaire.id AND app_userQuestionaire.userId=app_users.id','left')
						->where('app_users.id',$userId)
						->where('app_questionaire.deletedAt',NULL)
						->where('app_users.deletedAt',NULL)
						->group_by('app_questionaire.id')
						->order_by('app_questionaire.sortOrder')
						->get()
						->result();
		return $res;
	}

	public function userMonthlyStats($userId,$year,$month){
		$ret = [];
		$ret['ceiling']  = $this->db->select('units, snatch, powerSnatch, backSquat, frontSquat, pushPress, shoulderPress, PowerClean, deadLift, createdAt, updatedAt')
									->from('app_userMonthlyCeiling')
									->where('userId',$userId)
									->where('year',$year)
									->where('month',$month)
									->limit(1)
									->get()
									->row();

		$ret['physical'] = $this->db->select('units, weight, height, navalCircumference, waistCircumference, thighCircumference, calfCircumference, armCircumference, chestCircumference, createdAt, updatedAt')
									->from('app_userMonthlyPhysical')
									->where('userId',$userId)
									->where('year',$year)
									->where('month',$month)
									->limit(1)
									->get()
									->row();
		return $ret;
	}

	public function userDiaryEntry($userId,$year,$month){
		$res = $this->db->select('app_userDiary.week, app_userDiary.day, app_userDiary.mealType, app_userDiary.slotName, app_userDiary.optionId, app_userDiary.optionType, app_userDiary.createdAt, app_foods.name AS foodName')
						->select('app_recipes.name AS recipeName, app_recipes.id as recipeId')
						->from('app_userDiary')
						->join('app_foods',"app_foods.id= app_userDiary.optionId AND app_userDiary.optionType='Food'",'left')
						->join('app_recipes',"app_recipes.id= app_userDiary.optionId AND app_userDiary.optionType='Recipe'",'left')
						->where('app_userDiary.userId',$userId)
						->where('app_userDiary.optionId >',0)
						->where('MONTH(app_userDiary.week)',$month)
						->where('YEAR(app_userDiary.week)',$year)
						->order_by('app_userDiary.week, app_userDiary.day')
						->get()
						->result();

		$ret = [];

		foreach($res AS $row){
			/*
				if(!(isset($ret[$row->week])))
					$ret[$row->week] = [];

				if(!(isset($ret[$row->week][$row->day])))
					$ret[$row->week][$row->day] = [];

				if(!(isset($ret[$row->week][$row->day][$row->mealType])))
					$ret[$row->week][$row->day][$row->mealType] = [];

				$ret[$row->week][$row->day][$row->mealType][] = $row;
			*/

			$date = date('Y-m-d',strtotime("$row->week +".($row->day-1)."days"));
			
			if(!(isset($ret[$date])))
				
				$ret[$date] = ['mealBreakBB0'=>[],'mealBreakBB1'=>[],'mealBreakBB2'=>[],'Breakfast'=>[],'mealBreakAB0'=>[],'mealBreakAB1'=>[],'mealBreakAB2'=>[],'Lunch'=>[],'mealBreakAL0'=>[],'mealBreakAL1'=>[],'mealBreakAL2'=>[],'Dinner'=>[],'mealBreakAD0'=>[],'mealBreakAD1'=>[],'mealBreakAD2'=>[]];
			
			//if(!(isset($ret[$date][strtolower($row->mealType)])))
			//	$ret[$date][strtolower($row->mealType)] = [];

			$ret[$date][strtolower($row->mealType)][] = $row;
		}

		return $ret;
	}

	public function userStatChartData($userId,$year,$column){
		$ceilings = ['powerSnatch','backSquat','frontSquat','pushPress','shoulderPress','PowerClean'];
		$table    = (in_array($column, $ceilings)) ? 'app_userMonthlyCeiling' : 'app_userMonthlyPhysical';

		$res = $this->db->select("month, units, $column AS column, DATE_FORMAT(STR_TO_DATE(month, '%m'),'%M') AS montStr ")
						->from($table)
						->where('userId',$userId)
						->where('year',$year)
						->order_by('month')
						->get()
						->result();
		return $res;
	}

	public function getUserPhotos($userId){
		$res = $this->db->select("*")
						->from('app_userPhotos')
						->join('app_users','app_users.id=app_userPhotos.userId')
						->where('app_users.id',$userId)
						->where('app_userPhotos.deletedAt',NULL)
						->where('app_users.deletedAt',NULL)
						->order_by('app_userPhotos.id')
						->get()
						->result();
		return $res;
	}

}