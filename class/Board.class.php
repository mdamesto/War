<?php

require_once ("./interface/IGeneral.interface.php");

Class Board implements General{

	private $player1;
	private $player2;
	private $map;
	private $ships;
	private $width;
	private $height;

	public function __construct () {

		if (isset($_SESSION['board']))
		{
		}
		else {
			$this->player1 = New Player ( array (
				'playerName' => 'Joe',
				'fleetName' => 'Acid Santhil'
			));
			$this->player2 = New Player ( array (
				'playerName' => 'Gus',
				'fleetName' => 'Tibers Chaos'
			));
			$this->width = 150;
			$this->height = 100;
			$this->init_map();
		}
			print ("BOARD CREATED" . PHP_EOL);
	}

	public static function	doc()
	{
		if (file_exists('./class/Board.doc.txt'))
		{
			return file_get_contents('./class/Board.doc.txt');
		}
	}

	public function addShip(Ship $ship)
	{
		$this->ships[] = $ship;
	}

	private function checkPos(Array $pos)
	{
		foreach ($pos as $k)
		{
			if ($k['x'] < 0 || $k['x'] >= $this->width ||
					$k['y'] < 0 || $k['y'] >= $this->height)
					return (False);
			if ($this->map[$k['x']][$k['y']] != 0)
			{
				return $this->map[$k['x']][$k['y']];
			}
		}
		return 0;
	}

	public function placeShips()
	{
		foreach ($this->ships as $key => $ship)
		{
			if ($ship->getAtt('_owner') == 1)
			{
				$x = 0;
				$y = 0;
				$ship->setPosition(array('x' => $x, 'y'=> $y));
				while($this->checkPos($ship->getSpace(False))!== 0 ) {
					$x++;
					if ($x >= $this->width) {
						$x=0;
						$y++;
					}
					$ship->setPosition(array('x' => $x, 'y'=> $y));
				}
				$tab = $ship->getSpace(True);
			}

			if ($ship->getAtt('_owner') == 2)
			{
				$x = $this->width;
				$y = $this->height;
				$ship->setPosition(array('x' => $x, 'y'=> $y));
				while($this->checkPos($ship->getSpace(False)) !== 0)
				{
					$x--;
					if ($x <= 0)
					{
						$x=$this->width;
						$y--;
					}
					$ship->setPosition(array('x' => $x, 'y'=> $y));
				}
			}
			$tab = $ship->getSpace(True);
			foreach ($tab as $c)
			{
				$this->map[$c['x']][$c['y']] = $ship->getAtt('_id');
			}
		}

	}

	public function replaceShip($ship)
	{
		$tab = $ship->getFlatSpace('old');
		foreach ($tab as $c)
			$this->map[$c['x']][$c['y']] = 0;
		$newPos = $this->checkPos($ship->getFlatSpace('new'));
		if ($newPos == 0) {
			$tab = $ship->getFlatSpace('new');
			foreach ($tab as $c)
				$this->map[$c['x']][$c['y']] = $ship->getAtt('_id');
			return true;
		}
		else if($newPos == -1) {
			$ship->__destruct();
			return false;
		}
		else {
			$ship2 = $this->getShipById($newPos);
			$posShip2 = $ship2->getFlatSpace('new');
			$ship2->takeDmg($ship->getAtt('_Pv'));
			$ship->takeDmg($ship2->getAtt('_Pv'));
			if (!$ship2)
			foreach ($posShip2 as $c)
				$this->map[$c['x']][$c['y']] = 0;
			if ($ship) {
				$ship->posEgalOldPos();
				$tab = $ship->getFlatSpace('new');
			}
			foreach ($tab as $c)
				$this->map[$c['x']][$c['y']] = $ship->getAtt('_id');
			return false;
		}

	}


	public function getShipById($id)
	{
		foreach($this->ships as $ship)
		{
			if ($ship->getAtt('_id') == $id)
				return ($ship);
		}
	}

	public function sendShips()
	{
		$jsonships = array();
		for ( $i = 0;$i< $this->width; $i++) {
			for ($j = 0;$j < $this->height ; $j++) {
				if ($this->map[$i][$j] > 0)
				{
					$ship = $this->getShipById($this->map[$i][$j]);
					$jsonships[]= array('x' => $i, 'y' => $j, 'id' => $ship->getAtt('_id'), 'owner' => $ship->getAtt('_owner'));
				}
			}
		}
		return ($jsonships);
	}


	public function sendAsteroid()
	{
		$jsonasteroid = array();
		for ( $i = 0;$i< $this->width; $i++) {
			for ($j = 0;$j < $this->height ; $j++) {
				if ($this->map[$i][$j] == "-1")
				{
					$jsonasteroid[]= array('x' => $i, 'y' => $j);
				}
			}
		}
		return ($jsonasteroid);
	}

	public function print_map() {
		$i = -1;
		while (++$i < $this->height) {
			$j = -1;
			while (++$j < $this->width) {
				print ($this->map[$j][$i]);
			}
			print (PHP_EOL);
		}
	}

	public function add_meteor($x, $y , $size) {
		$yRange = 100;
		$xRange = 100;
    for ($j = -$yRange; $j < $yRange; $j++) {
      for ($i = -$xRange; $i < $xRange; $i++) {
		    if ($i*$i + $j*$j > $size * $size) {

		    } else {
		        $this->map[$i+$x][$j+$y] = "-1";
		    }
			}
    }
	}


	public function init_map() {
		$i = -1;
		while (++$i < $this->width) {
			$j = -1;
			while (++$j < $this->height) {
				$this->map[$i][$j] = '0';
			}
		}
		print ('Map initialized...' . PHP_EOL);
	}

	public function __destruct() {
		$_SESSION['board'] = serialize($this);
	}

	public function getSize()
	{
		return (array('x'=>$this->width, 'y'=>$this->height));
	}

	public function getPlayer1()
	{
		return ($this->player1);
	}

	public function getPlayer2()
	{
		return ($this->player2);
	}

	public function getMap($x, $y)
	{
		return $this->map[$x][$y];
	}

	public function getShips()
	{
		return ($this->ships);
	}
}

?>
