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
		$this->session->set_userdata('username', 'admin');
		
		redirect('chat', 'refresh');
	
	}
	
	public function logout()
	{
		$this->session->unset_userdata('isLoggedIn');
		$this->session->unset_userdata('username');
		
	
	}

}
