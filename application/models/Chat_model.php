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
	
	public function get_chat_messages($chat_id, $last_chat_message_id = 0)
	{
		$query_str = "SELECT cm.chat_message_id, cm.user_id, cm.chat_message_content, 
							DATE_FORMAT(cm.create_date, ' %H:%i:%s') AS chat_message_timestamp,
							u.name
							FROM chat_messages cm
							JOIN users u ON cm.user_id = u.user_id
							WHERE cm.chat_id = ?  
							AND cm.chat_message_id = ?
							ORDER BY chat_message_timestamp, u.name ASC";
	
		$result = $this->db->query($query_str, array($chat_id, $last_chat_message_id));
		
		return $result;
		
	}


}