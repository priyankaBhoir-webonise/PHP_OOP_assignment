<?php
	abstract class Person{
		protected $name;
		
		function __construct($in_name){
			$this->name=$in_name;
		}
		function __destruct(){
			unset($this->name);
		}
	}
	class Student extends Person{
		private $uniqeClassNumber,$classID;

		function __construct($in_name,$in_RollNo,$in_class){
			parent::__construct($in_name);
			$this->uniqeClassNumber=$in_RollNo;
			$this->classID=$in_class;
		}
		function __destruct(){
			unset($this->uniqeClassNumber);
			unset($this->classID);
		}
		function print_student(){
			echo ' Student :<br>Name : '.$this->name;
			echo '<br> Roll No: '.$this->uniqeClassNumber;
		}
	}

	class Teacher extends Person{
		private $title,$numOfDiscipline;
		private $discipline=array();
		function __construct($in_name,$in_title){
			parent::__construct($in_name);
			$this->title=$in_title;
			$this->numOfDiscipline=0;
		}
		function print_teacher()
		{
			echo 'Teacher : <br>Name : '.$this->name;
			echo '<br>Title : '.$this->title;
			echo '<br> Teaches : ';
			foreach($this->discipline as $discipline_1){
				$discipline_1->print_discipline();
			}
		}
		function assign_discipline($in_discipline)
		{
			$this->discipline[$this->numOfDiscipline++]=$in_discipline;
		}
		function __destruct(){
			unset($this->title);
		}
	}
	
	class School{
		private $classes,$name,$numOfClasses;					//composition    i.e school has a classes
		private $disciplines,$numOfDisciplines;					//composition
		private $teachers,$numOfTeachers;					//composition
		function __construct($name){
			$this->name=$name;
			echo "in School";
			$this->numOfClasses=0;
			$this->numOfDisciplines=0;
			$this->numOfTeacher=0;
		}
		function __destruct(){
			unset($this->name);
			unset($this->numOfClasses);
			unset($this->numOfDisciplines);
		}
		function addClasses($name){
			return ($this->classes[$this->numOfClasses++]= new Class_s($name));		
		}
		function addDiscipline($name,$lect,$excersises){
			return($this->disciplines[$this->numOfDisciplines++]= new Discipline($name,$lect,$excersises));
		}
		function addTeacher($name,$title){
			return($this->teachers[$this->numOfTeacher++]= new Teacher($name,$title));		
		}
		function print_school(){
			echo '<br>Name of school:'.$this->name.'<br> Classess : <br>';
			foreach($this->classes as $class){
				$class->print_class();
				echo '<br>';
			}
			echo '<br> School teaches following Disclipline : <br>';
			foreach($this->disciplines as $discipline){
				$discipline->print_discipline();
				echo '<br>';
			}
			echo '<br> School Teachers : <br>';
			foreach($this->teachers as $teacher1){
				$teacher1->print_teacher();
				echo '<br>';
			}
		}
	} 

	class Class_s{
		private $uniqueId,$numOfStudent;
		private $students=array();
		
		function __construct($nameOfClass){
			$this->uniqueId=$nameOfClass;
			$this->numOfStudent=0;
		}
		function __destruct(){
			unset($this->uniaueId);
			unset($this->numOfStudent);
		}
		function addStudent($name,$rollNo){
			$this->students[$this->numOfStudent++]=new Student($name,$rollNo,$this->uniqueId);
		}
		function print_class(){
			echo '<br> Class name:'.$this->uniqueId;
			echo '<br> This class have following students:<br>';
			
			foreach($this->students as $student){
				$student->print_student();
			}		
		}
	} 

	class Discipline{
		private $name,$numberOfLectures,$numberOfexercises;
		
		function __construct($in_name,$in_numLectures,$in_numExercises)
		{
			$this->name=$in_name;
			$this->numberOfLecturer=$in_numLectures;
			$this->numberOfexercises=$in_numExercises;
		}
		function __destruct()
		{
			unset($this->name);
			unset($this->numberOfLecturer);
			unset($this->numberOfexercises);
		}
		function print_discipline()
		{
			echo 'Discipline : <br>Name : '.$this->name;
			echo '<br>number Of Lecturer : '.$this->numberOfLecturer;
			echo '<br>number Of Exercises : '.$this->numberOfexercises;
		}
	}

	$new_school = new School('City high school'); 	
	$class_1=$new_school->addClasses("1st");
	$class_1->addStudent('abc pqr',1);
	$class_1->addStudent('xyz',2);
	
	$teacher_1=$new_school->addTeacher("mr. pathak","title_1");
	$discipline_1=$new_school->addDiscipline("ABCD",10,5);
	$teacher_1->assign_discipline($discipline_1);
	$new_school->print_school();
	
?>
