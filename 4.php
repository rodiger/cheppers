<?php
class Lesson{

	private $code = ""; 

	/*
	* Alapértékek beállítása
	*
	*/

	public function __construct() {

	} // public function __construct() end


	/*
	* Megoldás kiszámítása
	*
	*/

	public function setLesson( $code ) {
		
		$i = 0;
		
		while (!preg_match('#^0{6}#', md5($code.++$i)));
		
		//while (strpos(md5($code . ++$i), '000000') !== 0);

		$this->code = $i;

		

	} // public function setLesson() end


	/*
	* Megoldás kinyerése
	*
	*/

	public function getLesson() {
		
		return $this->code;

	} // public function getLesson() end


	/*
	* Megoldás kiírása
	*
	*/

	public function showLesson() {

		echo $this->getLesson();

	} // public function showLesson() end

} // Class Lesson end


$lesson = new Lesson();
$lesson->setLesson( "yzbqklnj" );
$lesson->showLesson();  
?>