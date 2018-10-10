<?php
class Fare_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	private function formatDaysStr($days){
		$daysName = array();
		
		if(is_array($days) && count($days) > 0){
			foreach ($days as $day){
				$daysName[] = date("D", strtotime("sunday +{$day} days"));
			}
		}
		
		return implode(', ', $daysName);
	}

	public function getFixedPointFaresList(){
		$rows = $this->db->select('fares.id, rules.id as rule_id, fares.one_way, fares.round_trip')
							->select('rules.route_id, rules.vehicle_type, rules.start_date, rules.end_date, rules.start_time, rules.end_time, rules.days, rules.status')
							->select('one_way.ac AS one_way_ac, one_way.non_ac AS one_way_non_ac ')
							->select('round_trip.ac AS round_trip_ac, round_trip.non_ac AS round_trip_non_ac')
							->select('routes.start_city, routes.end_city, routes.start_addr, routes.end_addr, routes.distance, routes.duration')
							->select('cs.name as start_city_name, ce.name as end_city_name')
							->from('rules')
							->join('fares','fares.id=rules.fare_id')
							->join('one_way','one_way.id=fares.one_way')
							->join('round_trip','round_trip.id=fares.round_trip')
							->join('routes','routes.id=rules.route_id')
							->join('cities as cs', "cs.id = routes.start_city")
							->join('cities as ce', "ce.id = routes.end_city")
							->order_by('fares.id', 'DESC')
							->get()
							->result();

		foreach ($rows as &$row){
			$row->days = json_decode($row->days);
			$row->days_fmt = $this->formatDaysStr($row->days);
		}



		return $rows;
	}

	public function getFixedPointFare($fareId){
		$row = $this->db->select('fares.id, rules.id as rule_id, fares.one_way, fares.round_trip')
							->select('rules.route_id, rules.vehicle_type, rules.start_date, rules.end_date, rules.start_time, rules.end_time, rules.days, rules.status')
							->select('one_way.ac AS one_way_ac, one_way.non_ac AS one_way_non_ac ')
							->select('round_trip.ac AS round_trip_ac, round_trip.non_ac AS round_trip_non_ac')
							->select('routes.start_city, routes.end_city, routes.start_addr, routes.end_addr, routes.distance, routes.duration, routes.status')
							->select('cs.name as start_city_name, ce.name as end_city_name')
							->from('rules')
							->join('fares','fares.id=rules.fare_id')
							->join('one_way','one_way.id=fares.one_way')
							->join('round_trip','round_trip.id=fares.round_trip')
							->join('routes','routes.id=rules.route_id')
							->join('cities as cs', "cs.id = routes.start_city")
							->join('cities as ce', "ce.id = routes.end_city")
							->where('fares.id', $fareId)
							->get()
							->row();
		$row->days = json_decode($row->days);
		$row->days_fmt = $this->formatDaysStr($row->days);

		return $row;
	}

	public function addNewFare($rules,$oneWay,$roundTrip){
		$rules['status'] = 1;
		$rules['days']   = json_encode($rules['days']);

		$result   = $this->db->insert('one_way', $oneWay);
		$onewayId = $this->db->insert_id();
		
		$result    = $this->db->insert('round_trip', $roundTrip);
		$roundTrip = $this->db->insert_id();

		$result = $this->db->set('one_way',$onewayId)->set('round_trip',$roundTrip)->insert('fares');
		$fareId = $this->db->insert_id();

		$rules['fare_id'] = $fareId;
		$result = $this->db->insert('rules', $rules);
		$ruleId = $this->db->insert_id();
		
		return $fareId;
	}

	public function updatedFixedPointFare($fareId,$rules,$oneWay,$roundTrip){
		$fare          = $this->getFixedPointFare($fareId);
		$rules['days'] = json_encode($rules['days']);

		$result = $this->db->set($rules)->where('id',$fare->rule_id)->update('rules');
		$result = $this->db->set($oneWay)->where('id',$fare->one_way)->update('one_way');
		$result = $this->db->set($roundTrip)->where('id',$fare->round_trip)->update('round_trip');

		return true;
	}


	public function updateStatus($action,$fares){
		$status = 0;
		$status = ($action == 'activate') ? 1  : $status;
		$status = ($action == 'deactivate') ? 0 : $status;

		foreach ($fares as $fareId) {
			$fare   = $this->getFixedPointFare($fareId);
			$result = $this->db->set('status',$status)->where('id',$fare->rule_id)->update('rules');
		}

		return true;
	}
}