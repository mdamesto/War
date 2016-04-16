<?php

trait Position {
	public function			setPosition($position) {
		if (isset($position['dir']))
			$this->_position['dir'] = $position['dir'];
		$this->_position['x'] = $position['x'];
		$this->_position['y'] = $position['y'];
	}

	public function			getSpace($physical = FALSE) {
		$offl = ($this->_size['l'] - 1) / 2;
		$offL = ($this->_size['L'] - 1) / 2;
		if ($physical !== TRUE)
		{
			$offl += $this->_weapons[0]->getShootAera()['near'];
			$offL += $this->_weapons[0]->getShootAera()['near'];
		}
		$offX = (($this->_position['dir'] === 'N' OR $this->_position['dir'] === 'S') ? $offl : $offL);
		$offY = (($this->_position['dir'] === 'N' OR $this->_position['dir'] === 'S') ? $offL : $offl);
		$x = $this->_position['x'] - $offX;
		$y = $this->_position['y'] - $offY;
		$xMax = $this->_position['x'] + $offX;
		$yMax = $this->_position['y'] + $offY;

		for ($i = $y; $i <= $yMax; $i++)
		{
			for ($j = $x; $j <= $xMax; $j++)
				$aera[] = array('x' => $j, 'y' => $i);
		}
		return $aera;
	}

	public function			getFlatSpace($when) {
		$offl = ($this->_size['l'] - 1) / 2;
		$offL = ($this->_size['L'] - 1) / 2;
		if ($when == 'old' )
		{
			print_r ($this->_oldPosition);
			if ($this->_oldPosition['dir'] === 'N' || $this->_oldPosition['dir'] === 'S') {
				$offX = $offl;
				$offY = $offL;
			}
			else {
				$offX = $offL;
				$offY = $offl;
			}
			$x = $this->_oldPosition['x'] - $offX;
			$y = $this->_oldPosition['y'] - $offY;
			$xMax = $this->_oldPosition['x'] + $offX;
			$yMax = $this->_oldPosition['y'] + $offY;
		}
		else
		{
			print_r ($this->_position);
			if ($this->_position['dir'] === 'N' || $this->_position['dir'] === 'S') {
				$offX = $offl;
				$offY = $offL;
			}
			else {
				$offX = $offL;
				$offY = $offl;
			}
			$x = $this->_position['x'] - $offX;
			$y = $this->_position['y'] - $offY;
			$xMax = $this->_position['x'] + $offX;
			$yMax = $this->_position['y'] + $offY;
		}

		for ($i = $y; $i <= $yMax; $i++)
		{
			for ($j = $x; $j <= $xMax; $j++)
				$aera[] = array('x' => $j, 'y' => $i);
		}
		return $aera;
	}



}

?>