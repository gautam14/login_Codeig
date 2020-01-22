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
		$data['posts'] = $this->posts_model->getRows('$id');
		$data['title'] = $data['posts']['title'];
		
		$this->load->view("templates/header",$data);
		$this->load->library('table');

		$data = array(
		        array('Name', 'Color', 'Size'),
		        array('Fred', 'Blue', 'Small'),
		        array('Mary', 'Red', 'Large'),
		        array('John', 'Green', 'Medium')
		);

		echo $this->table->generate($data);
		$this->load->view("posts/view",$data);

		$this->load->view("templates/footer");
	}
	
	public function add(){ 
		die("test");
		}
}

?>
