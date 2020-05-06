<?php

echo "test";

class Person {

	public $name;

	function __construct($persons_name) {

		$this->name = $persons_name;

	}

	function set_name($new_name){

		$this->name = $new_name;

	}

	function get_name(){
		return $this->name;
	}


}




class Employee extends Person {



}