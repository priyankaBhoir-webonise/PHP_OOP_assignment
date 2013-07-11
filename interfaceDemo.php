<?php
	interface IAnimal
	{
		public function talk();
	}
	
	abstract class Cat implements IAnimal{
		protected $name;

		function __construct($name){
			$this->name=$name;
		}
		abstract function printInfo();
		
	}

	class Kitten extends Cat{
		function __construct($name){
			parent::__construct($name);
		}
		public function talk(){
			echo '<br>mueeeew';
		}
		function printInfo(){
			echo '<br>I am Kitten<br>';
			echo 'My name is :'.$this->name;
		}		
	}

	class TomCat extends Cat{
		function __construct($name){
			parent::__construct($name);
		}
		public function talk(){
			echo '<br>muew';
		}
		function printInfo(){
			echo '<br>I am TomCat';
			echo '<br>My name is :'.$this->name;
			echo '<br>I like to chase Jerry';
		}		
	}

	class Dog implements IAnimal{
		public function __construct(){
			//echo '<br>Hello,I am Dog';		
		}
		public function talk(){
			echo '<br>I am Dog<br> jaff';		
		}
	}
		
	class TestAnimals{
		
		
		function __construct(){
			$animals= array(new Kitten('kitty'),new Dog(),new TomCat('Tom'));
			foreach($animals as $animal1){
				$animal1->talk();
				if($animal1 instanceof Cat)			
						$animal1->printInfo();
			echo '<br>';
			}
		
		}
	}
	$new = new TestAnimals();
?>
