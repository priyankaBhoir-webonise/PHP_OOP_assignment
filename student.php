<?php
		class student{
			private $full_name;
			private $course, $specialty,$university,$email, $phone;
			
			function __construct($fullname){
				$this->full_name=$fullname;	
			}
			
			function set_course($course){
				echo 'IN SET Course';
				$this->course=$course;
			}
			function set_specialty($specialty){
				$this->specialty=$specialty;
			}
			function set_university($university){
				$this->university=$university;
			}
			function set_email($email){
				$this->email=$email;
			}
			function set_phone($phone){
				$this->phone=$phone;
			}
			
			function get_name(){
				return $this->full_name;
			}
		
			function get_course(){
				return $this->course;
			}
			function get_specialty(){
				return $this->specialty;
			}
			function get_university(){
				return $this->university;
			}
			function get_email(){
				return $this->email;
			}
			function get_phone(){
				return $this->phone;
			}
			function set_details($course,$specialty,$university,$email,$phone)
			{
				echo 'IN SET DETAILS';
				 $this->set_course($course);
				 $this->set_specialty($specialty);
				 $this->set_university($university);
				 $this->set_email($email);
				 $this->set_phone($phone);
			}
			function print_details(){
				echo '<br> Student:<br />';
				echo "<br> Full name : ";
				echo $this->get_name();
				echo "<br> course : ".$this->get_course();
				echo "<br> specialty :".$this->get_specialty();
				echo "<br> university :".$this ->get_university();
				echo "<br> email : ".$this->get_email();
				echo "<br> phone : ".$this->get_phone();
			}
		}

		
		$student1= new student("Priyanka_Bhoir");
		$student2= new student('Anuja More');
		$student1->set_details('BE','IT','University of pune','priyanka.bhoir@gmail.com',9876543210);
		$student2->set_details('MCA','Computer','University of pune','Anuja_more@gmail.com',9876543210);
		$student1->print_details();
		$student2->print_details();

?>
