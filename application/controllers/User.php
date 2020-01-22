<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model("user_model");
	}

	public function index(){
		//echo "user page";
		$this->load->view("pages/login");
	}

	public function register(){
		//echo "user page";
		$this->load->view("pages/register");
	}

	public function register_submit(){
		$form_data = array(
			'u_name' => $this->input->post("user_name"),
			'u_email' => $this->input->post("user_email"),
			'u_pswd' => $this->input->post("user_password"),
			'u_age' => $this->input->post("user_age"),
			'u_mob' => $this->input->post("user_mobile")
		);

		print_r($form_data);
		//print_r($this->user_model->index());
		$this->user_model->user_register($form_data);
	}
}
