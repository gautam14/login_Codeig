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
			$data['content'] = $data['posts']['content'];
			
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
	public function delete ($id){
		$delete = $this->posts_model->delete($id);
		if($delete){
			$this->session->set_userdata('success_msg', 'Post has been removed successfully.');
		}else {
			$this->session->set_userdata('error_msg', 'Something went wrong, please try again.');
		}
		
		redirect('/posts');
		
		
		}
}

?>
