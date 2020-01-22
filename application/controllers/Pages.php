<?php
class Pages extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
	}
	
	public function index($page = 'home')
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';
		//print_r($data['news']);
       $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
	}

	
	public function view($page = 'about', $slug = NULL)
	{		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['page_content_home'] = "It is Home page.";
		$data['page_content_about'] = "It is About page.";		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}



