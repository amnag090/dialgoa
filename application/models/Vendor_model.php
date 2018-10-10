<?php
class Vendor_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function isEmailRegistered($email){
		$rows = $this->db->select('id')
					->from('vendors')
					->where('email',$email)
					->limit(1)
					->get()
					->result();
	
		return (count($rows) > 0) ? true : false;
	}

	public function saveVendor($vendor){
		$result   = $this->db->insert('vendors',$vendor);
		$vendorId = $this->db->insert_id();

		return $vendorId;
	}

	public function Vendors(){
		$rows = $this->db->select('id, name, license_number, owner_name, email, business_type, referal_type, address, phone1, phone2, status')
					->from('vendors')
					->order_by('name')
					->get()
					->result();
		return $rows;
	}

	public function deleteVendor($vendorId){
		$res = $this->db->where('id',$vendorId)->limit(1)->delete('vendors');
		return $res;
	}

	public function updateStatus($action,$vendors){
		$status = 0;
		$status = ($action == 'approved') ? 1  : $status;
		$status = ($action == 'rejected') ? -1 : $status;

		$res    = $this->db->set('status',$status)
						->where_in('id',$vendors)
						->update('vendors');

		return $res;
	}

	public function updateVendor($vendor,$vendorId){
		$result   = $this->db->set($vendor)
							->where('id',$vendorId)
							->update('vendors');
		return $result;
	}

	public function getVendor($id){
		$row = $this->db->select('id, name, license_number, owner_name, email, business_type, referal_type, address, phone1, phone2, status')
					->from('vendors')
					->where('id',$id)
					->limit(1)
					->get()
					->row();
		return $row;
	}
}