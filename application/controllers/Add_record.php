<?php
class Add_record extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");

	}

	public function index(){
		$this->load->view('pages/add_record');
	}
	public function submit_form() {
		$this->form_validation->set_rules('user_name', 'Please enter name', 'trim|required');
		$this->form_validation->set_rules('user_position', 'Please enter position', 'trim|required');
		$this->form_validation->set_rules('user_office', 'Please enter office', 'trim|required');
		$this->form_validation->set_rules('user_age', 'Enter your age', 'trim|required|greater_than_equal_to[18]');
		$this->form_validation->set_rules('user_date', 'Please enter date', 'trim|required');
		$this->form_validation->set_rules('user_salary', 'Please enter salary', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('pages/add_record');
        }
        else
        {
        	$data = array(
				'name' => $this->input->post("user_name"),
				'position' => $this->input->post("user_position"),
				'office' => $this->input->post("user_office"),
				'age' => $this->input->post("user_age"),
				'date' => $this->input->post("user_date"),
				'salary' => $this->input->post("user_salary")
			);
			$res = $this->user_model->add_record($data);
			//print_r($res);
			//die("end");			
			if($res==true)	        
	        {
			    $this->session->set_flashdata('success', "Data Inserted Successfully!"); 
			    //$this->load->view('pages/add_record', $data);
			    redirect('add_record');
			}else{
			    $this->session->set_flashdata('error', "Something went wrong");
			}
            
        }		
		// echo "<pre>";
		// print_r($data);
	}

	public function get_records(){
    	//echo "get records";
    	$columns = array(
    		0 => 'id',
    		1 => 'name',
    		2 => 'position',
    		3 => 'office',
    		4 => 'age',
    		5 => 'date',
    		6 => 'salary',
    		7 => 'id',
    	);

    	$limit = $this->input->post('length');
    	$start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $count = $this->user_model->get_records_count();
        $totalFiltered = $count; 

        if(empty($this->input->post('search')['value']))
        {            
            //echo "search is empty";
            $post_record = $this->user_model->get_all_records($limit,$start,$order,$dir);
            // echo "<pre>";
            // print_r($post_record);
        }
        else {
        	$search = $this->input->post('search')['value']; 
        	//echo "search is not empty";
        	$post_record = $this->user_model->get_search_records($limit,$start,$search,$order,$dir);
        	$totalFiltered = $this->user_model->search_record_count($search);
        	//echo $search;
        }

        $data = array();
        if(!empty($post_record)){
        	$i = 0;
        	foreach($post_record as $post){
        		$i++;
        		$nested_data['id'] = $i;
        		$nested_data['name'] = $post->name;
            	$nested_data['position'] = $post->position;
            	$nested_data['office'] = $post->office;
            	$nested_data['age'] = $post->age;
            	$nested_data['date'] = $post->date;
            	$nested_data['salary'] = $post->salary;
            	$nested_data['edit'] = '<button type="button" name="update" id="'.$post->id.'" class="btn btn-warning btn-xs update">Update</button>';
            	$nested_data['delete'] = '<button type="button" name="delete" id="'.$post->id.'" class="btn btn-danger btn-xs delete">Delete</button>';

            $data[] = $nested_data;	

        	}
        	
        }

        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($count),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 

    }

    public function get_user_record(){
    	//echo "update_record";die;
    	$user_id = $this->input->post("user_id");
    	$user_data = $this->user_model->update_record($user_id);
    	//print_r($user_data);
    	echo json_encode($user_data);
    	//die();
    }

    public function update_user_record(){

        $data = array(
            'id' => $this->input->post("empId"),
            'name' => $this->input->post("u_name"),
            'position' => $this->input->post("u_position"),
            'office' => $this->input->post("u_office"),
            'age' => $this->input->post("u_age"),
            'date' => $this->input->post("u_date"),
            'salary' => $this->input->post("u_salary")
        );
        //print_r($data);
        $query = $this->user_model->update_user_record($data);
        if($query==true)          
            {
                //$this->session->set_flashdata('edit_success', "Data updated Successfully!");
                redirect('add_record');
            }else{
                //$this->session->set_flashdata('edit_error', "Something went wrong");
            }
    }

    public function delete_user_record(){
        $user_id = $this->input->post("user_id");
        $query = $this->user_model->delete_user($user_id);
        echo json_encode($query);
    }
    
}
?>