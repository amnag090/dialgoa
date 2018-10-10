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
}