<?php 

class Chat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function load_chat($input)
	{
		$this->db->query(" CREATE TABLE IF NOT EXISTS active_chats  (
						  id int not null auto_increment primary key,
						  chat_id varchar(200),
						  username varchar(50))
						  ");
						 
		$query_str = "INSERT INTO active_chats (chat_id, username) VALUES (?,?)"; 
		$this->db->query($query_str, array($input['chat_id'], $input['username']));
		
		$query_str = "INSERT INTO chat (chat_id) VALUES (?)"; 
		$this->db->query($query_str, array($input['chat_id']));
		
		return;
	
	}
	
	
	public function add_chat_message($chat_id, $chat_message_content)
	{
		$query_str = "INSERT INTO chat_messages (chat_id, chat_message_content) VALUES(?,?)";
		
		$this->db->query($query_str, array($chat_id, $chat_message_content));
	
	}
	
	public function get_chat_messages($chat_id)
	{
		$query_str = "SELECT cm.chat_message_content, 
							DATE_FORMAT(cm.create_date, ' %H:%i:%s') AS chat_message_timestamp,
							u.username
							FROM chat_messages cm
							JOIN active_chats u ON cm.chat_id = u.chat_id
							WHERE cm.chat_id = ? 
							ORDER BY chat_message_timestamp, u.username ASC";
	
		$result = $this->db->query($query_str, array($chat_id));
		
		return $result;
		
	}


}