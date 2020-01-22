<?php
class Posts_model extends CI_Model {
	
	public function index(){
		echo "model";
	}

	public function getRows(){
		$query = $this->db->get("posts");
		return $query->result_array();
	}
}

?>