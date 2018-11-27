<?php
class Lesson{

	private $code        = ""; 
	private $routes      = Array();
	private $route_santa = Array();
	private $route_robot = Array();
	private $trip        = Array();
	private $trip_santa  = Array( 'x:0,y:0' );
	private $trip_robot  = Array( 'x:0,y:0' );
	private $act_santa_x = 0;
	private $act_santa_y = 0;
	private $act_robot_x = 0;
	private $act_robot_y = 0;

	/*
	* Alapértékek beállítása
	*
	*/

	public function __construct() {
		
		$this->code = file_get_contents( "3_input.txt" );

	} // public function __construct() end


	/*
	* Megoldás kiszámítása
	*
	*/

	public function setLesson() {
		
		$this->routes = str_split( $this->code, 1 );

		foreach ( $this->routes as $k => $v ) {

			if ( $k % 2 == 0 ) { $act_name = "santa"; } else { $act_name = "robot"; }

			if ( $v == ">" ) { $this->{'act_'.$act_name.'_x'}++; }
			if ( $v == "<" ) { $this->{'act_'.$act_name.'_x'}--; }
			if ( $v == "^" ) { $this->{'act_'.$act_name.'_y'}++; }
			if ( $v == "v" ) { $this->{'act_'.$act_name.'_y'}--; }

			if ( !in_array( 'x:'.$this->{'act_'.$act_name.'_x'}.',y:'.$this->{'act_'.$act_name.'_y'}, $this->{'trip_'.$act_name} ) ) {

				$this->{'trip_'.$act_name}[] = 'x:'.$this->{'act_'.$act_name.'_x'}.',y:'.$this->{'act_'.$act_name.'_y'};

			} // if ( !in_array( 'x:'.$this->{'act_'.$act_name.'_x'}.',y:'.$this->{'act_'.$act_name.'_y'}, $this->{'trip_'.$act_name} ) ) vége

		} // foreach ( $this->routes as $k => $v ) end

		$this->trip = array_unique( array_merge( $this->trip_santa, $this->trip_robot ), SORT_STRING );

	} // public function setLesson() end


	/*
	* Megoldás kinyerése
	*
	*/

	public function getLesson() {
		
		return count( $this->trip );

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
$lesson->setLesson();
$lesson->showLesson();  
?>