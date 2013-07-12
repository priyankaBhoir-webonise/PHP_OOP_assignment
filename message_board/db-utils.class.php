<?php
	
	require_once 'message.class.php'; 
	
	class DBUtils{
		private $data;
		private function dbConnect(){						// connects to the MySQL database and selects Messages database
			try{
			$data = new PDO('mysql:host=localhost;dbname=Messages', 'root', 'webonise6186');
			}
			catch(Exception $e)
			{
					echo 'Exception : '.$e->getMessage();
			}
			return $data;
		}
	
   	 	function getAllMessages(){					//returns an array of Message objects containing all messages from the database
			$data=$this->dbConnect();
			$msg=array();
			$i=0;
			$stmt=$data->query("select * from messages",PDO::FETCH_ASSOC);
			if($stmt!==false){			
				foreach($stmt as $row){
					$msg[$i]=new Message($row['id'],$row['author'],$row['subject'],$row['msgDate'],$row['msgBody']);
					$i++;
				}
			return $msg;
			}
			return false;
		}	

    		function addMessage($msg){					//inserts a message given as Message object to the database
			$data=$this->dbConnect();
			$input_arr=$msg->get_all();
			$query=$data->prepare("insert into messages values (?,?,?,?,?)");
			if($query->execute(array('',$input_arr['subject'],$input_arr['author'],$input_arr['msgBody'],$input_arr['msgDate']))){
					
					return true;		
			}	

			return false;
			
		}
		function searchMessage($msg_id){
			$data=$this->dbConnect();
			$stmt=$data->query("select * from messages where id='".$msg_id."' ",PDO::FETCH_ASSOC);
			if($stmt!==false){			
				foreach($stmt as $row){
					$msg=new Message($row['id'],$row['author'],$row['subject'],$row['msgDate'],$row['msgBody']);
				}	
			return $msg;
			}
			return false;
		}
    		function updateMessage($msg){ 						//updates a message given as Message object in the database
			$data=$this->dbConnect();
			$input_arr=$msg->get_all();
			$query=$data->prepare("update messages set author=?,subject=?,msgDate=?,msgBody=? where id=? ");
				
			if($query->execute(array($input_arr['author'],$input_arr['subject'],$input_arr['msgDate'],$input_arr['msgBody'],$input_arr['id']))===true)	{
				return true;		
			}	
			return false;
		}
    		function deleteMessageById($msg_id){					//deletes given message specified by its primary key
			$data=$this->dbConnect();
			$query=$data->prepare("delete from messages where id=? ");
				
			if($query->execute(array($msg_id))===true)	{
				return true;		
			}	
			return false;	
		}
	}	
?>
