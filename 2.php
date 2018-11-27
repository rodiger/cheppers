<?php
class Lesson{

	private $code; 
	private $result_sizes; 
	private $result_ribbons; 
	public  $sizes; 
	public  $ribbons;	

	/*
	* Alapértékek beállítása
	*
	*/

	public function __construct() {
		
		$this->code = file('2_input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	}

	/*
	* Megoldás kiszámítása
	*
	*/

	public function setLesson() {
		
		$all  = 0;
		$all2 = 0;

		foreach ( $this->code as $v ) {

			$size_array = explode( "x", $v );

			// Egyes oldalak méretei
			$this->sizes[$v]['l'] = $size_array[0];
			$this->sizes[$v]['w'] = $size_array[1];
			$this->sizes[$v]['h'] = $size_array[2];

			// Egyes oldalak képlete
			$this->sizes[$v]['sides'][0] = $this->sizes[$v]['l'] * $this->sizes[$v]['w'];
			$this->sizes[$v]['sides'][1] = $this->sizes[$v]['w'] * $this->sizes[$v]['h'];
			$this->sizes[$v]['sides'][2] = $this->sizes[$v]['h'] * $this->sizes[$v]['l'];

			$min_side_array = array_flip( $this->sizes[$v]['sides'] );

			ksort( $min_side_array );

			$min_side = key($min_side_array);

			// Maga a képlet
			$result = ( 2 * $this->sizes[$v]['sides'][0]) + ( 2 * $this->sizes[$v]['sides'][1] ) + ( 2 * $this->sizes[$v]['sides'][2] );

			$this->sizes[$v]['result'] = $result + $min_side; 	

			$all = $all + $this->sizes[$v]['result'];

			// Ribbonok
			sort( $size_array );
			
			$this->ribbons[$v] = $size_array[0] + $size_array[0] + $size_array[1] + $size_array[1] + ( $size_array[0] * $size_array[1] * $size_array[2] );

			$all2 = $all2 + $this->ribbons[$v];

		} // foreach ( $this->code as $v ) end

		$this->result_sizes = $all;
		$this->result_ribbons = $all2;

	} // setLesson() end


	/*
	* Megoldás kinyerése
	*
	*/

	public function getLesson() {

		return $this->result_sizes;

	} // getLesson() end


	/*
	* Megoldás kiírása
	*
	*/

	public function showLesson() {

		echo $this->getLesson();

	} // showLesson() end



	/*
	* Ribbon megoldás kiírása
	*
	*/

	public function showRibbons() {

		echo $this->result_ribbons;

	} // showLesson() end	

} // Class Lesson end


$lesson = new Lesson();
$lesson->setLesson();
$lesson->showLesson(); 
echo "<hr />";
$lesson->showRibbons(); 
?>