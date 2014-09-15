<?php 

class Chat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function add_chat_message($chat_id, $user_id, $chat_message_content)
	{
		$query_str = "INSERT INTO chat_messages (chat_id, user_id, chat_message_content) VALUES(?,?,?)";
		
		$this->db->query($query_str, array($chat_id, $user_id, $chat_message_content));
	
	}


}