<?php
class Posts_model extends CI_Model {

	public function getRows($id = ""){
		if(!empty($id)){		
			$query = $this->db->get_where("posts", array('id' => $id));
			return $query->row_array();
		}else {
			$query = $this->db->get("posts");
			return $query->result_array();
		}
	}
	
	public function delete($id){
			$delete = $this->db->delete("posts", array("id" => $id));
			return $delete?true:false;
			
	}
}
?>
