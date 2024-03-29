<?php 

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('chat_model');
	
	}
	
	public function index()
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$data['isLoggedIn'] = true;
			
		}
		
		$data['base_url'] = base_url();
		$this->load->view('chat_init', $data);
		
		/*send in chat_id and user_id
		
		$chat_id = 1;
		
		$data['chat_id'] = 1;
		$data['user_id'] = 1234;
		
		$this->session->set_userdata('last_chat_message_id_'.$chat_id, '0' );
		
		$this->load->view('chat_view', $data);
		
		*/
	
	}
	
	public function start_chat()
	{
		$input['username'] = $this->input->post('name');
		$input['chat_id'] = $this->input->post('date').'_'.$this->input->post('name');
		
		$this->chat_model->load_chat($input);
		
		$data['chat_id'] = $input['chat_id'];
		$data['base_url'] = base_url();
		$data['username'] = $input['username'];
		
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
		$username = $this->input->post('username');
		$chat_message_content = $this->input->post('chat_message_content');
		
		$this->_add_chat_messages($chat_id, $chat_message_content);
		
		echo $this->ajax_get_chat_messages($chat_id, $username);
	
	}
	
	
	public function ajax_get_chat_messages()
	{
		$chat_id = $this->input->post('chat_id');
		$username = $this->input->post('username');
		
		echo $this->_get_chat_messages($chat_id, $username);
	
	}
	
	function _add_chat_messages($chat_id, $chat_message_content)
	{
		$this->chat_model->add_chat_message($chat_id, $chat_message_content);
		
		
	}
	
	function _get_chat_messages($chat_id, $username)
	{
		//$last_chat_message_id = (int)$this->session->userdata('last_chat_message_id_'.$chat_id);
		
		$chat_messages = $this->chat_model->get_chat_messages($chat_id);
		
		if($chat_messages->num_rows() > 0)
		{
		
			//we have some chat. let's return 
			
			//we store the last chat message id
			
			//$last_chat_message_id = $chat_messages->row($chat_messages->num_rows() - 1)->chat_message_id;
			
			//$this->session->set_userdata('last_chat_message_id_'.$chat_id, $last_chat_message_id);
			
			$chat_messages_html = '<ul>';
			
			foreach($chat_messages->result() as $chat_message)
			{
				$li_class = '';
				
				if($chat_message->username != $username)
				{
					$li_class .= ' class="bubble bubble-alt yellow " ';
				
				}
				else
				{
					$li_class .= ' class="bubble" ';
				}
				
				$chat_messages_html .= '<li '.$li_class.'>'.$chat_message->chat_message_content.'<br /><span>'.
										$chat_message->username.' - '.$chat_message->chat_message_timestamp.'</span></li>';
			
			}
			
			$chat_messages_html .= '</ul>';

			return $chat_messages_html;
			
		}
		else
		{
			//we have no chat yet
		
		}
	
	}

}
