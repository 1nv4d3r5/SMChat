<?php 

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('chat_model');
	
	}
	
	public function index()
	{
		/*send in chat_id and user_id */
		
		$data['chat_id'] = 1;
		$data['user_id'] = 1234;
		
		$this->load->view('chat_view', $data);
	
	}
	
	public function ajax_add_chat_message()
	{
		/*things that need to be POST'ed to this function
		 *
		 *chat_id
		 *user_id
		 *chat_message_content
		*/
		
		$chat_id = $this->input->post('chat_id');
		$user_id = $this->input->post('user_id');
		$chat_message_content = $this->input->post('chat_message_content');
		
		$this->chat_model->add_chat_message($chat_id, $user_id, $chat_message_content);
	
	}

}
