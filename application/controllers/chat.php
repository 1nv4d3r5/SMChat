<?php 

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function index()
	{
		
		$this->load->view('chat_view');
		
	
	}

}
