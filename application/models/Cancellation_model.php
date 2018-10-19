<?php
class Cancellation_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert($between,$and,$charge){
		$result   = $this->db->set('between',$between)
							->set('and',$and)
							->set('charge',$charge)
							->insert('cancellation_policies');
		$canPolId = ($result) ? $this->db->insert_id() : false;

		return $canPolId;
	}

	public function policyList(){
		$rows = $this->db->select('id, between, and, charge')
						->from('cancellation_policies')
						->order_by('between', 'ASC')
						->order_by('and', 'ASC')
						->get()
						->result();
		return $rows;
	}

	public function getCancellationPolicy($policyId){
		$row = $this->db->select('id, between, and, charge')
						->from('cancellation_policies')
						->where('id',$policyId)
						->get()
						->row();
		return $row;
	}

	public function deletePolicy($policyId){
		$res = $this->db->where('id',$policyId)->limit(1)->delete('cancellation_policies');
		return $res;
	}

	public function updateCancellationCharge($policyId, $charge){
		$result = $this->db->set('charge',$charge)
							->where('id',$policyId)
							->limit(1)
							->update('cancellation_policies');

		return $result;
	}


	/*public function getOptionsForSelectList($tableName){
		$rows = $this->db->select('id, title')
					->from($tableName)
					->where('status',1)
					->order_by('title','DESC')
					->get()
					->result();
		return $rows;
	}

	public function getAllCities(){
		$this->db->select('id, name');
		$this->db->from('cities');
		$this->db->order_by('name');
		$result = $this->db->get()->result_array();
		$outArr = array();
		foreach ($result as $row){
			$outArr[] = $row;
		}

		return $outArr;
	}*/
}