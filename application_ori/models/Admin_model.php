<?php
	class Admin_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			
		}

		public function updateAdminCity($userId, $cityId){
			$this->db->set('cityId', $cityId);
			$this->db->where('id', $userId);
			$res  = $this->db->update('app_admins');

			print $this->db->last_query();

			return $res;
		}
		
		
		
		public function loginCheck($email,$password){
			$this->db->select('id, firstName, lastName, email, password, profilePic, isActive, lastLogin, createdAt, updatedAt');
			$this->db->from('app_admins');
			$this->db->where('email',$email);
			$this->db->limit(1);
			$admin = $this->db->get()->row();

			if(!$admin)
				return False;

			$this->load->helper('phpass');
			//$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);    	
			if(MD5($password) == $admin->password){				
				//$this->db->set('lastLogin', date("Y-m-d H:i:s"));
				//$this->db->where('id', $admin->id);
				//$this->db->update('app_admins');
				unset($admin->password);
				return $admin;
			} else {
				return False;
			}
		}

		public function changePassword($adminId, $password){
			//$this->load->helper(array('string','phpass'));
			//$password = random_string('alnum',10);
			//$hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			//$hash     = $hasher->HashPassword($password);

			$this->db->set('password', MD5($password));
			$this->db->where('id', $adminId);
			$this->db->update('app_admins');

			return true;
		}

		public function getAdminDetails($userId){
			$this->db->select('id, firstName, lastName, email, profilePic, aboutMe, isActive, lastLogin, createdAt, updatedAt')
					 ->from('app_admins')
					 ->where('app_admins.id',$userId)
					 ->where('app_admins.deletedAt',null)
					 ->limit(1);
			$result = $this->db->get()->result_array();

			$outArr = array();
			foreach ($result as $row){
				$outArr[] = $row;
	    	}

	    	return $outArr[0];
		}

		public function saveEdit($adminId, $email, $firstName, $lastName, $photoFile){
					
			return $result = $this->db->set('firstName', $firstName)
						->set('email', $email)
						->set('lastName', $lastName)
				 		->set('profilePic', $photoFile)
						->set('updatedAt', date("Y-m-d H:i:s"))
						->where('id', $adminId)
						->update('app_admins');	
			//print $this->db->last_query();
		}

		public function emailExists($email){
			$count = $this->db->select('id')
						   ->from('app_admins')
						   ->where('deletedAt',null)
						   ->where('email',$email)
						   ->count_all_results();

			return ($count > 0) ? true : false;
		}

		/*
		public function cookieLogin($id){
			$this->db->select('id, name, email, isActive, lastLogin, createdAt, updatedAt');
			$this->db->from('app_admins');
			$this->db->where('id',$id);
			$this->db->where('isActive','1');
			$this->db->limit(1);
			$admin = $this->db->get()->row();

			if(!$admin)
				return False;

			return $admin;
		}

		public function resetForgotPassword($email){
			$this->db->select('id, name, email, isActive');
			$this->db->from('app_admins');
			$this->db->where('email',$email);
			$this->db->limit(1);
			$admin = $this->db->get()->row();

			if(!$admin)
				return False;

			$this->load->helper(array('string','phpass'));
			$password = random_string('alnum',10);
			$hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			$hash     = $hasher->HashPassword($password);

			$this->db->set('password',$hash);
			$this->db->where('id', $admin->id);
			$this->db->update('app_admins');
			
			$this->load->library('email');
			$this->email->from('no-reply@zaatar.in', 'Food App');
			$this->email->to($admin->email); 
			$this->email->subject('Your password has been reset');
			$this->email->message("Hi {$admin->name}! \r\n Your new password is: {$password}, please change the password after you login.\r\n Thank you!");
			$this->email->send();

			return True;
		}

		public function generatePassword(){
			
			$this->load->helper(array('string','phpass'));
			$password = $_GET['password'];
			$hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			print $hash     = $hasher->HashPassword($password);

			
		}*/
	}