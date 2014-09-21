<?php 

class login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	
	}

	public function index() 
	{
		$this->load->view('login');
		
	}
	
	public function auth()
	{
		$this->session->set_userdata('isLoggedIn', 'yes');
		
		redirect('chat', 'refresh');
	
	}

}
