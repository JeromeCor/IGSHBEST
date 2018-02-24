<?php

class TSP {
	protected $nodes;
	function getNextNode($from, $state) {
		$next = array_shift($this->nodes);
		return $next ? array($next, $state) : false;
	}
	function load($file) {
		$this->nodes = array_map(function($a) {return explode(' ', $a);}, file($file, FILE_IGNORE_NEW_LINES));
		array_shift($this->nodes);
	}
	function solve() {
		
		$answer = array();
		$next = null;
		while ($next = $this->getNextNode($next[0], $next[1])) {
			$answer[] = $next[0];
		}
		return $answer;
	}
    
	function getDistance($start, $end) {
		return sqrt(pow ($start[0] - $end[0],2) + pow($start[1] - $end[1],2));
	}
    
	function getScore($path) {
		$distance = 0;
		for ($i=1;$i<count($path); $i++) {
			$distance += $this->getDistance($path[$i], $path[$i-1]);
		}
		return $distance;
	}
    
	function getPath($path) {
		return implode('->', array_map(function ($a) {return "($a[0], $a[1])";}, $path));
	}
	
	function getSwog($path) {
		$score = $this->getScore($path);
		$method = get_class($this);
		$swog = <<<EOM
new 1100,1100 
string 20,20 {Andres Viikmaa, $method. Score: $score } :tekst
coordsys west south right up
origin 50,50

EOM;
		for($i=0;$i<count($path);$i++){
			$swog .= "fcircle ".$path[$i][0].",".$path[$i][1]." 3 :p".($i+1)."\r\n";
		}
		$swog .= "# insert here your solution instead of 1 2 3 ... \r\n";
		for($i=1; $i<count($path);$i++){
			$swog .= "line (p".($i).") (p".($i+1).")\r\n";
		}
		$swog .= "line (p".($i).") (p1)\r\n";
		return $swog;
	}
}

class BruteForceTSP extends TSP {
	protected $best = null;
	protected $bestScore = 1000000000000000;
	protected $counter = 0;
	private function bruteForce($todo, $walked = array( )) {
		if (empty($todo)) {
			$this->analyze($walked);
		}  else {
			for ($i = 0; $i<count($todo); $i++) {
				$_todo = $todo;
				unset($_todo[$i]);
				//var_dump(array(array_values($_todo), array_merge($walked, array($todo[$i]))));
				$this->bruteForce(array_values($_todo), array_merge($walked, array($todo[$i])));
			}
		}
	}
	function analyze($nodes) {
		$score = $this->getScore($nodes);
		if ($score < $this->bestScore) {
			$this->bestScore = $score;
			$this->best = $nodes;
			//echo "best so far: ".$this->bestScore.", atempt: ".(++$this->counter).PHP_EOL;
            //echo "<br />";
			//echo "Path: ".$this->getPath($this->best).PHP_EOL.PHP_EOL;
			//echo "<br />";
            //echo "Swog: ".PHP_EOL.$this->getSwog($this->best).PHP_EOL.PHP_EOL;
            //echo "<br />";
            
		}
	
	}
	function solve() {
		$first = array_shift($this->nodes);
		$this->bruteForce($this->nodes, array($first));
		return $this->best;
	}
	
}
/*class NearestNeighbourTSP extends TSP {
	function getNextNode($from, $state) {
		if ($from != null) {
			$t = $this;
			usort($this->nodes, function($a, $b) use($from, $t) {
				return $t->getDistance($from, $a) < $t->getDistance($from, $b) ? -1:1; 
			});
		};
		return TSP::getNextNode($from, $state);
	}
}*/
function runTsp($tsp, $file){
	$_tsp = new $tsp();
	$_tsp->load($file);
	//echo "[".date("Y-m-d H:i:s")."] start $tsp".PHP_EOL;
    //echo "<br />"
	$path = $_tsp->solve();
    echo implode('->', array_map(function ($a) {return "($a[0], $a[1])";}, $path));
    //echo "[".date("Y-m-d H:i:s")."] end $tsp".PHP_EOL;
    //echo "<br />"
	//echo "Score: ".$_tsp->getScore($path).PHP_EOL;
    //echo "<br />"
	//echo "Path: ".$_tsp->getPath($path).PHP_EOL.PHP_EOL;
    //echo "<br />"
	//echo "Swog: ".PHP_EOL.$_tsp->getSwog($path).PHP_EOL.PHP_EOL;
    //echo "<br />"
}

//runTSP('TSP', 'TSP_10.txt');
runTSP('BruteForceTSP', 'TSP_10.txt');
//runTSP('NearestNeighbourTSP', 'TSP_10.txt');
