<?php
	class Fixedpoints_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			
		}
		
		public function getAllFixedpoints(){
			$this->db->select('r.id, r.start_city, cs.name as start_city_name, r.end_city, ce.name as end_city_name, start_addr, end_addr, distance, duration, r.status');
			$this->db->from('routes as r');
			$this->db->join('cities as cs', "cs.id = r.start_city", "inner");
			$this->db->join('cities as ce', "ce.id = r.end_city", "inner");
			
			//$this->db->where('r.status',1);
			$this->db->order_by('id');
			$result = $this->db->get()->result_array();

			$outArr = array();
			foreach ($result as $row){
				
				$outArr[] = $row;
	    	}

	    	return $outArr;
		}
		
		public function getActiveFixedPoints(){
			$this->db->select('r.id, r.start_city, cs.name as start_city_name, r.end_city, ce.name as end_city_name, start_addr, end_addr, distance, duration, r.status');
			$this->db->from('routes as r');
			$this->db->join('cities as cs', "cs.id = r.start_city", "inner");
			$this->db->join('cities as ce', "ce.id = r.end_city", "inner");
			$this->db->where('r.status',1);
			$this->db->order_by('id');
			$result = $this->db->get()->result();

	    	return $result;
		}
		
		public function getFixedpointsById($fixedpointssId){
			$this->db->select('r.id, r.start_city, r.end_city, start_addr, end_addr, distance, duration, r.status');
			$this->db->from('routes as r');
			$this->db->where('r.id',$fixedpointssId);
			$this->db->limit(1);
			$result = $this->db->get()->result_array();

			$outArr = array();
			foreach ($result as $row){
				$outArr[] = $row;
	    	}

	    	return $outArr[0];
		}

		public function saveNewFixedpoint($pointFrom, $pointFromAddress, $pointTo, $pointToAddress, $distance, $duration){
			
			$this->db->set('start_city', $pointFrom);
			$this->db->set('end_city', $pointTo);
			$this->db->set('start_addr', $pointFromAddress);
			$this->db->set('end_addr', $pointToAddress);
			$this->db->set('distance', $distance);
			$this->db->set('duration', $duration);
			$this->db->set('status', 1);
			$res  = $this->db->insert('routes');

			$fixedpointssId = $this->db->insert_id();

			//print $this->db->last_query();

			return $fixedpointssId;
		}

		public function updateFixedpoint($fixedpointssId, $pointFrom, $pointFromAddress, $pointTo, $pointToAddress, $distance, $duration){
			$this->db->set('start_city', $pointFrom);
			$this->db->set('end_city', $pointTo);
			$this->db->set('start_addr', $pointFromAddress);
			$this->db->set('end_addr', $pointToAddress);
			$this->db->set('distance', $distance);
			$this->db->set('duration', $duration);
			$this->db->where('id', $fixedpointssId);
			$res  = $this->db->update('routes');

			//print $this->db->last_query();

			return $res;
		}

		

		public function updateFixedpointStatuses($status, $fixedpoints){
			
			$this->db->set('status', $status);
			$this->db->where_in('id', $fixedpoints);
			$res  = $this->db->update('routes');

			//print $this->db->last_query();

			return $res;
		}


		//delete not implemented yet
		public function deleteFixedpoint($fixedpointId){
			$res = $this->db->where('id',$fixedpointId)->limit(1)->delete('routes');
			return $res;
		}

	}