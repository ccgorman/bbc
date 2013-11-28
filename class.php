<?php
interface iRomanNumeralGenerator {
	public function generate($data); // convert from int -> roman
	public function parse($data); // convert from roman ->int
}

class converter implements iRomanNumeralGenerator {
	public $roman="";
	public $numeric=0;
	public $status='Complete';
	
	function generate($data) {
		
	}
	
	function parse($data) {
		
	}
}
?>