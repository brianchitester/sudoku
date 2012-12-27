<?php
class Sudoku
{
		public $s = []; //main array

		//x, y, and z lookup tables
		public $x = [
			0 => [],
			1 => [],
			2 => [],
			3 => [],
			4 => [],
			5 => [],
			6 => [],
			7 => [],
			8 => [],
		];
		public $y = [
			0 => [],
			1 => [],
			2 => [],
			3 => [],
			4 => [],
			5 => [],
			6 => [],
			7 => [],
			8 => [],
		];
		public $z = [
			0 => [],
			1 => [],
			2 => [],
			3 => [],
			4 => [],
			5 => [],
			6 => [],
			7 => [],
			8 => [],
		];
		//indexs of locked vertexes
		public $locked = [];
}

class Vertex{
		public $value = 0;
		public $sindex = 0;
    public $short = FALSE;
    public $x = 0;
		public $y = 0;
		public $z = 0;
		public $xyzlocks = [
			"x lock" => FALSE,
			"y lock" => FALSE,
			"z lock" => FALSE,
		];
		public $possible = [
			1, 2, 3, 4, 5, 6, 7, 8, 9,
		];
}

function getZ($x, $y){
	if ($y < 3){
		if ($x < 3){
			$z = 0;
		}
		else if ($x > 2 && $x < 6){
			$z = 1;
		}
		else if ($x > 5 ){
			$z = 2;
		}
	}
	else if ($y > 2  && $y < 6){
		if ($x < 3){
			$z = 3;
		}
		else if ($x > 2 && $x < 6){
			$z = 4;
		}
		else if ($x > 5 ){
			$z = 5;
		}
	}
	else if ($y > 5){
		if ($x < 3){
			$z = 6;
		}
		else if ($x > 2 && $x < 6){
			$z = 7;
		}
		else if ($x > 5 ){
			$z = 8;
		}
	}
	return $z;
}

function init($S){
	for ($y = 0; $y < 9; $y++){
		for ($x = 0; $x < 9; $x++){
			//set everything and add to array? "x"."y"."z"
			$V = new Vertex;
			$z = getZ($x, $y);
	
			$V->x = $x;
			$V->y = $y;
			$V->z = $z;
			$name = $x . $y . $z;

			//if value is set
			if (isset ($_POST[$name])){
				$V->value = $_POST[$name];
				$V->possible = array($V->value);
				$V->short = TRUE;
			}
			
			//add to master array
			array_push($S->s, $V);
			$sIndex = sizeof($S->s)-1;

			//set s index in vertex
			$V->sindex = $sIndex;

			if (isset ($_POST[$name])){
				array_push($S->locked, $V->sindex);
			}

			//add to x, y, and z lookup tables
			array_push($S->x[$x], $sIndex);
			array_push($S->y[$y], $sIndex);
			array_push($S->z[$z], $sIndex);
		}
	}
}

function isSolved($S){ //crude check makes a lot of assumtions, more like isFull
	foreach($S->s as $V){
		if ($V->value == 0){ //if value has not been set
			return FALSE;
		}
	}
	return TRUE; //true if all values are set
}

//1. consider writing general "check" function instead
//**************edit short definition here********
function checkNeighbors($S, $V){
	$hit = 0;
	$short = 0;
	$hitshort = [];
	if ($V->value != 0){
		
		//check x
		foreach($S->x[$V->x] as $n){
			if (array_key_exists($V->value, $S->s[$n]->possible)){
				unset($S->s[$n]->possible[$V->value]);
			} 
			if (sizeof($S->s[$n]->possible) < 3){ //**************edit short definition here x 3
				if (sizeof($S->s[$n]->possible) == 1){ //gotcha!
					reset($S->s[$n]->possible);
					$S->s[$n]->value = current($S->s[$n]->possible);
					array_push($S->locked, $V->sindex);
					$hit++;
				}
				else {
					$S->s[$n]->short = TRUE;
					$short++;
				}
			}
		}
		//check y
		foreach($S->y[$V->y] as $n){
			if (array_key_exists($V->value, $S->s[$n]->possible)){
				unset($S->s[$n]->possible[$V->value]);
			} 
			if (sizeof($S->s[$n]->possible) < 3){  //**************edit short definition here x 3
				if (sizeof($S->s[$n]->possible) == 1){ //gotcha!
					reset($S->s[$n]->possible);
					$S->s[$n]->value = current($S->s[$n]->possible);
					array_push($S->locked, $V->sindex);
					$hit++;
				}
				else {
					$S->s[$n]->short = TRUE;
					$short++;
				}
			}
		}
		
		//check z
		foreach($S->z[$V->z] as $n){
			if (array_key_exists($V->value, $S->s[$n]->possible)){
				unset($S->s[$n]->possible[$V->value]);
			} 
			if (sizeof($S->s[$n]->possible) < 3){  //**************edit short definition here x 3
				if (sizeof($S->s[$n]->possible) == 1){ //gotcha!
					reset($S->s[$n]->possible);
					$S->s[$n]->value = current($S->s[$n]->possible);
					array_push($S->locked, $V->sindex);
					$hit++;
				}
				else {
					$S->s[$n]->short = TRUE;
					$short++;
				}
			}
		}
	}
	array_push($hitshort, $hit);
	array_push($hitshort, $short);
	return $hitshort;
}


function solve($S){
	//puzzle is solved when locked array contains 81 elements
	$active = TRUE;
	$i = 0;
	$totalhit = sizeof($S->locked)-1;
	$totalshort = sizeof($S->locked)-1;

	while($active){
		//set $V to each locked vertex
		$V = $S->s[$S->locked[$i]];
		
		
		$hitshort = checkNeighbors($S, $V); //number of $Vs locked "hit" and number of $Vs shorted
		echo "hit: $hitshort[0]";
		echo "short: $hitshort[1]";
		$totalhit += $hitshort[0];
		$totalshort += $hitshort[1];
		echo "totalhit: $totalhit";
		echo "totalshort: $totalshort";
		//from this, we should be able to determine a "hit score" and "short score", as we progress through the
		//need to compile all echo data into graphical output
	
		//total short must have some threshold where backtracking becomes necesary
		//at this point, we have the check neighbors infinitely algo which should work on its own
		//we need to wrap up this code and thest if checkneighbors is enough to solve the sudoku

		//html output:
		
		

		//reset conditions
		if($i < 80){
			if( $i = sizeof($S->locked)-1){
				$i=0;
			}
			else{
				$i++;
			}
		}
		else{
			$active = FALSE; //end
			echo "DONE";
		}
		
	}	


while(sizeof($S->locked) != 81){
		$i=0;
		while($i < sizeof($S->locked)-1){  //main loop
			

			//reset condiition
			if( $i = sizeof($S->locked)-2){
				$i=0;
			}
			else{
				$i++;
			}
		}
	}
}

$S = new Sudoku;
init($S);
solve($S);

/*print first row - y = 0
foreach($S->y[0] as $vert){
	echo $S->s[$vert]->value;
	echo "<br><br>";
}
*/

?>

<?php phpinfo() ?>
