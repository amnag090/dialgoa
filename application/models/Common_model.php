<?php
class Common_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}


	public function getOptionsForSelectList($tableName){
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
	}
}