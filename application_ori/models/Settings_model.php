<?php
	class Settings_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			
		}
		
		public function getSettings(){
			$this->db->select('videoLink, faqLink');
			$this->db->from('app_settings');
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		public function updatesetting($videoLink, $faqLink){
			$this->db->set('videoLink', $videoLink);
			$this->db->set('faqLink', $faqLink);
			$res  = $this->db->update('app_settings');

			return $res;
		}

		public function getSpalshContent(){
			$this->db->select('*');
			$this->db->from('app_splashPage');
			$this->db->where('app_splashPage.id',1);
			$this->db->limit(1);
			return $this->db->get()->row();
		}


		public function updateSplashContent($page1, $page2, $page3, $videourl){
			$this->db->set('page1', $page1);
			$this->db->set('page2', $page2);
			$this->db->set('page3', $page3);
			$this->db->set('videoUrl', $videourl);
			$res  = $this->db->update('app_splashPage');

			return $res;
		}
		

	}