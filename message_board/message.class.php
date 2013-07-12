<?php
	class Message{
		private $id, $author, $subject, $msgDate,$msgBody;
	
		function __construct($in_id, $in_author, $in_subject, $in_msgDate,$in_msgBody)
		{
			$this->id=$in_id;
			$this->author=$in_author;
			$this->subject=$in_subject;
			$this->msgDate=$in_msgDate;
			$this->msgBody=$in_msgBody;
		}
		
		function get_all(){
			$arr=array('id' =>$this->id,
					'author' =>$this->author,
					'subject' =>$this->subject,
					'msgDate'=>$this->msgDate,
					'msgBody'=>$this->msgBody
				);
			return $arr;
		}
	}
?>
