<?php
interface iRomanNumeralGenerator {
	public function generate($data); // convert from int -> roman
	public function parse($data); // convert from roman ->int
}

class converter implements iRomanNumeralGenerator {
	private $roman="";
	private $numeric=0;
	private $status=false;
	private $message='';
	private $minvalue=1;
	private $maxvalue=3999;
	private $romanNumerals = array('I'=>1,'V'=>'5','X'=>'10','L'=>50,'C'=>100,'D'=>500,'M'=>1000);
	private $subtractivePairs = array('IV'=>4,'IX'=>'9','XL'=>'40','XC'=>90,'CD'=>400,'CM'=>900);
	
	public function generate($data) {
		if(preg_match('/[^0-9\.,\s]/', $data)) {
			$this->message="You have entered an invalid numeric character.";
		}
		else {
			$data=preg_replace("/[,\s]/","",$data);
			$data=intval($data);
			if ($data<$this->minvalue || $data>$this->maxvalue) {
				$this->message="The number you have entered is out of range.";
			}
			else {
				$allRomanNumerals = array_merge($this->romanNumerals, $this->subtractivePairs);
				arsort($allRomanNumerals);
				while (list($key, $val) = each($allRomanNumerals)) {
					if ($data>=$val) {
						$temp=floor($data/$val);
						for ($i=0;$i<$temp;$i++) {
							$this->roman.=$key;
							$data-=$val;
						}
					}
				}
				$this->status=true;
			}
		}
	}
	
	public function parse($data) {
		$data=strtoupper($data);
		if($this->check_and_calculate_roman($data)) {
			$this->status=true;
		}
	}
	
	private function check_and_calculate_roman($data) {
		$valid=true;
		if (preg_match('/[^IVXLCDM]/', $data)) {
			$valid=false;
			$this->message="You have entered an invalid Roman character.";
			return $valid;
		}
		elseif (preg_match('/[I]{4}/', $data) || preg_match('/[V]{4}/', $data) || preg_match('/[X]{4}/', $data) || preg_match('/[L]{4}/', $data) || preg_match('/[C]{4}/', $data) || preg_match('/[D]{4}/', $data) || preg_match('/[M]{4}/', $data)) {
			$valid=false;
			$this->message="Roman characters should avoid 4 of the same units in a row.";
			return $valid;
		}
		else {
			$allRomanNumerals = array_merge($this->romanNumerals, $this->subtractivePairs);
			$current="";
			$next="";
			$total=strlen($data);
			$currentval=0;
			$previousval=0;
			$totalval=0;
			for ($i=0;$i<$total;$i++) {
				$current=substr($data,$i,1);
				if (($i+1)<=$total) {
					$next=substr($data,($i+1),1);
				}
				else {
					$next="";
				}
				if ($next && isset($allRomanNumerals[$current.$next])) {
					$currentval=$allRomanNumerals[$current.$next];
					$totalval+=$allRomanNumerals[$current.$next];
					$i++;
				}
				else {
					$currentval=$allRomanNumerals[$current];
					$totalval+=$allRomanNumerals[$current];
				}
				if ($previousval && $currentval>$previousval) {
					$valid=false;
					$this->message="Your Roman characters are out of sequence.";
					return $valid;
				}
				elseif ($totalval>$this->maxvalue) {
					$valid=false;
					$this->message="Your Roman characters have exceeded the maximum value.";
					return $valid;
				}
				$previousval=$currentval;
			}
			$this->numeric=$totalval;
		}
		return $valid;
	}
	
	public function get_data($key) {
		return $this->$key;
	}
}
?>