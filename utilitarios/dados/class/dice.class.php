<?php

class Dice{
	public $d2, $d4, $d6, $d8, $d10, $d12, $d20, $d100;

	function __construct(){
		$this->d2();
		$this->d4();
		$this->d6();
		$this->d8();
		$this->d10();
		$this->d12();
		$this->d20();
		$this->d100();
	}

	function d2(){
		$this->d2 = rand(1,2);
	}

	function d4(){
		$this->d4 = rand(1,4);
	}

	function d6(){
		$this->d6 = rand(1,6);
	}

	function d8(){
		$this->d8 = rand(1,8);
	}

	function d10(){
		$this->d10 = rand(1,10);
	}

	function d12(){
		$this->d12 = rand(1,12);
	}

	function d20(){
		$this->d20 = rand(1,20);
	}

	function d100(){
		$this->d100 = rand(1,100);
	}
}