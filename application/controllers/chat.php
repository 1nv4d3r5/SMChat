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
	
	public function ajax_add_chat_messages()
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
		
		$this->_add_chat_messages($chat_id, $user_id, $chat_message_content);
	
	}
	
	function _add_chat_messages($chat_id, $user_id, $chat_message_content)
	{
		$this->chat_model->add_chat_message($chat_id, $user_id, $chat_message_content);
		
		$this->_get_chat_messages($chat_id);
		
	}
	
	public function ajax_get_chat_messages()
	{
		$chat_id = $this->input->post('chat_id');
		
		$this->_get_chat_messages($chat_id);
	
	}
	
	function _get_chat_messages($chat_id)
	{
		
		$chat_messages = $this->chat_model->get_chat_messages($chat_id);
		
		if($chat_messages->num_rows() > 0)
		{
			//we have some chat. let's return 
			
			$chat_messages_html = '<ul>';
			
			foreach($chat_messages->result() as $chat_message)
			{
				if($chat_message->user_id == 1234)
				{
					$li_class = 'class="bubble"';
				
				}
				else
				{
					$li_class = 'class="bubble bubble-alt yellow "';
				
				}
				
				$chat_messages_html .= '<li '.$li_class.'>'.$chat_message->chat_message_content.'<br /><span>'.
										$chat_message->name.' - '.$chat_message->chat_message_timestamp.'</span></li>';
			
			}
			
			$chat_messages_html .= '</ul>';

			echo $chat_messages_html;
			
			exit;
			
		}
		else
		{
			//we have no chat yet
		
		}
	
	}

}
