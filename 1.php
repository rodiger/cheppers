<?php
function feladat1() {
	
	$code = file_get_contents( "1_input.txt" );
	$array           = str_split( $code, 1 );
	$act_floor       = 0;
	$up              = 0;
	$down            = 0;
	$m_floor_step    = 0;
	$jart_a_minuszon = FALSE; 

	foreach ( $array as $k => $v )   {

		if ( $v == "(" ) { $act_floor++; $up++; }

		if ( $v == ")" ) { $act_floor--; $down++; }

		if ( $act_floor == -1 && $jart_a_minuszon == FALSE ) { $jart_a_minuszon = TRUE; $m_floor_step = $k + 1; }		

	}

	echo "Kapott kód karaktereinek száma: ". strlen( $code )."<br />";
	echo "Utasítás tömb kulcsinak száma: ". count( $array )."<br />";
	echo "Aktuális emelet: ". $act_floor."<br />";
	echo "Felfelé emeletek száma: ". $up."<br />";
	echo "Lefelé emeletek száma: ". $down."<br />";
	echo "Hányadik lépésre érkezik meg a -1-es szintre: ". $m_floor_step."<br />";

}


feladat1(); 
?>