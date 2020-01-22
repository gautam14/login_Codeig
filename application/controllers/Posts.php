<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("posts_model");
	}
	public function index(){
		$data = array();
		$data['posts'] = $this->posts_model->getRows();
		$data['title'] = 'Posts archive';

		$this->load->view("templates/header",$data);
		$this->load->view("posts/index",$data);
		$this->load->view("templates/footer");
	}

	public function view($id){
		$data = array();
		if(!empty($id)){
			$data['posts'] = $this->posts_model->getRows($id);
			$data['title'] = $data['posts']['title'];
			
			//print_r($data['posts']['title']);
			
			$this->load->view("templates/header",$data);
			$this->load->view("posts/view",$data);
			$this->load->view("templates/footer");
		}else{
			redirect("/posts");
			}
		
	}
	
	public function add(){ 
		die("test");
	}
	public function edit($id){
		$postData = $this->posts_model->getRows($id);
		echo "<pre>";
		print_r($postData);
	}
}

?>
