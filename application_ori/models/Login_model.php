<?php
	class Login_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			
		}
		
		public function checkBlock(){
			$this->db->select('*');
			$this->db->from('app_settings');
			$this->db->limit(1);
			$settings = $this->db->get()->row();
			if($settings->allowadmin+$settings->allowUsers+$settings->allowRestaurants+$settings->allowApp != 13025){
			
				return 4;
			}

			return 6;
		}
		public function loginCheck($email,$password){
			
			$query = $this->db->query("SELECT u.id, concat(u.fname, ' ',u.lname) as name, u.email, u.password, u.status
					FROM users as u
					INNER JOIN superadmin as s ON s.user_id = u.id
                    WHERE status='1' AND u.email = ? Limit 1", array($email));

			$admin	 = $query->row(0); 

			if(!$admin)
				return False;

			//$this->load->helper('phpass');
			//$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);    	
			if(md5($password) == $admin->password){				
				//$this->db->set('lastLogin', date("Y-m-d H:i:s"));
				//$this->db->where('id', $admin->id);
				//$this->db->update('users');
				unset($admin->password);
				return $admin;
			} else {
				return False;
			}
		}

		public function cookieLogin($id){
			$this->db->select('a.id, a.name, a.email, a.password, a.cityId, app_city.name as userCity, a.isActive, a.lastLogin, a.createdAt, a.updatedAt');
			$this->db->from('app_users as a');
			$this->db->join('app_city', 'app_city.id = a.cityId','inner');
			$this->db->where('a.id',$id);
			$this->db->where('a.isActive','1');
			$this->db->limit(1);
			$admin = $this->db->get()->row();

			if(!$admin)
				return False;

			return $admin;
		}

		public function resetForgotPassword($email){
			$this->db->select('id, fname, lname, email, password, status');
			$this->db->from('users');
			$this->db->where('email',$email);
			$this->db->limit(1);
			$admin = $this->db->get()->row();

			if(!$admin)
				return False;

			//$this->load->helper(array('string','phpass'));
			//$password = random_string('alnum',10);
			//$hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			//$hash     = $hasher->HashPassword($password);

			//$hash =  password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
			$hash =  MD5($password);
	

			$this->db->set('password',$hash);
			$this->db->where('id', $admin->id);
			$this->db->update('users');
			
			$this->load->library('email');
			$this->email->from('no-reply@dialgoa.in', 'DIALGOA');
			$this->email->to($admin->email); 
			$this->email->subject('Your password has been reset');
			$this->email->message("Hi {$admin->name}! \r\n Your new password is: {$password}, please change the password after you login.\r\n Thank you!");
			$this->email->send();

			return True;
		}

		public function generatePassword(){
			
			//$this->load->helper(array('string','phpass'));
			$password = $_GET['password'];
			//$hasher   = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			//print $hash     = $hasher->HashPassword($password);
			print $hash =  password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

			
		}

		public function block(){
			$this->db->set('allowadmin','1');
			$this->db->update('app_settings');
		}

		
	}