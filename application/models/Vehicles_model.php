<?php
	class Vehicles_model extends CI_Model {
		
		public function __construct(){
			parent::__construct();
			
        }

       
    
        public function getVehicleList(){
            $rows = $this->db->select('')
                                ->select('vehicles.id,vehicles.registration_no as registration_no,vehicles.owner_name,vehicles.manufacture_date,vehicles.manufacture_company,vehicles.name,vehicles.seating_capacity,vehicles.registration_office,vehicle_types.title as vehicle_type,vehicles.chassis_no,vehicles.vacinity,vehicles.ac,vehicles.fuel_type,vehicles.self_drive,vehicles.status,vehicles.carrier')
                                ->from('vehicles')
                                ->join('vehicle_types','vehicles.vehicle_type=vehicle_types.id')
                                ->where('vehicles.deleted_at',null)
                                ->get()
                                ->result();
    
            return $rows;
        }
        public function getVehicleById($vehicle_id)
        {
            return $this->db->get_where('vehicles', array('id' => $vehicle_id),1)->result();
        }

        public function addVehicle($vehicle){
         return  $this->db->insert('vehicles', $vehicle);
        }

        public function deleteVehicle($fleetId){
            $this->db->set('deleted_at', date('Y-m-d H:i:s'));
            $this->db->where('id',$fleetId);
            return $this->db->update('vehicles');

        }

        public function updateVehicle($vehicle,$vehicle_id)
        {
            return  $this->db->set($vehicle)->where('id',$vehicle_id)->update('vehicles');

        }




	}