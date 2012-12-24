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
}

class Vertex
{
		public $value = 0;
    //public $locked = TRUE; not needed, just check if possible has only one item
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
		
		public function setShort($s){
			$this->$short = $s;
		}
    
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
			}
			
			//add to master array
			array_push($S->s, $V);

			//s index - sizeof($S->s)-1;

			//add to x, y, and z lookup tables
			array_push($S->x[$x], sizeof($S->s)-1);
			array_push($S->y[$y], sizeof($S->s)-1);
			array_push($S->z[$z], sizeof($S->s)-1);
			

		}
	}
	echo $S->s[0]->value;
}

$S = new Sudoku;
init($S);

/*print first row - y = 0
foreach($S->y[0] as $vert){
	echo $S->s[$vert]->value;
	echo "<br><br>";
}
*/

?>

<?php phpinfo() ?>
