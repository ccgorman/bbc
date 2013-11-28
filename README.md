bbc
===

Coding Kata: Roman Numerals

Requirements :
PHP 5.3.8 or higher
Convert a Base 10 to Roman Numerals
Convert a Roman Numerals to Base 10
Write a class that implements a supplied interface
Build a web interface to your converter

Rules:
The application only supports numeric values between 1 and 3999
Roman Numerals with more then four M will be rejected
Convert user supplied Roman numerals to uppercase
Convert user supplied numeric values to integer, removing decimals, spaces and commas
$romanNumerals = ['I'=>1,'V'=>'5','X'=>'10','L'=>50,'C'=>100,'D'=>500,'M'=>1000];
Roman Numerals are placed in order, largest to the left, aside from when using subtractive notation
Roman Numerals should avoid being repeated four in succession
I can be placed before V and X
X can be placed before L and C
C can be placed before D and M
$subtractivePairs = ['IV'=>4,'IX'=>'9','XL'=>'40','XC'=>90,'CD'=>400,'CM'=>900];

Pseudocode:

Base 10 to Roman Numerals:
Test a valid numeric value has been supplied
Initialise an empty string
Start with the highest value and work your way through thousands, hundreds, tens and units
Test if the numeric value matches a $subtractivePairs
	If True Append to string result
	Else Find the largest divider in $romanNumerals
		Append to string result
Return string

Roman Numerals to Base 10:
Test a valid Roman Numeral has been supplied
Initialise a zero value int
Starting from left to right
	Test if pair is $subtractivePairs
		if true add pair to int
		else add left Roman numeral value to int and move to next numeral and repeat
Return int

Test Driven Development:
A series of tests will be defined prior to build, please review tests.txt
