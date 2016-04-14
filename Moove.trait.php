<?php

trait Moove {
	public function move($move) {
		if ($this->currentSpeed === 0) {
			print ($this->name . ' already use all it\'s moves for this turn' . PHP_EOL);
			return ;
		}
		if (($this->currentSpeed - $move) >= 0) {
			$old_x = $this->pos['x'];
			$old_y = $this->pos['y'];
			if ($this->orient == 'South')
				$this->pos['x'] = $this->pos['x'] - $move;
			if ($this->orient == 'North')
				$this->pos['x'] = $this->pos['x'] + $move;
			if ($this->orient == 'East')
				$this->pos['y'] = $this->pos['y'] + $move;
			if ($this->orient == 'West')
				$this->pos['y'] = $this->pos['y'] - $move;
			$this->currentMan += $move;
			$this->isMoving = true;
			$this->currentSpeed -= $move; 
			print ($this->name . ' move ' . $move . ' times from [ ' . $old_x . ' : ' . $old_y . ' ] to [ ' . $this->pos['x'] . ' : ' . $this->pos['y'] . ']. ' . $this->currentSpeed . ' times left.' . PHP_EOL);
		}
		else
			print ($this->name . ' can\'t move more than ' . $this->currentSpeed . ' this turn' . PHP_EOL );
	}
	public function orient ($rot) {
		if ($this->isMoving == false) {
			$this->orient = $rot;
			print ($this->name . ' is now oriented to ' . $this->orient . PHP_EOL);
		}
		else if ($this->isMoving == true && $this->currentMan >= $this->man) {
			$this->orient = $rot;
			print ($this->name . ' is now oriented to ' . $this->orient . PHP_EOL);
			$this->currentMan = 0;
		}
		else
			print ($this->name . ' can\'t rotate, due to inertia' . PHP_EOL . 'Hope it will not crash into some fucking obstacle' . PHP_EOL . 'It must move ' . ($this->man - $this->currentMan) . ' time(s) more before it can rotate' . PHP_EOL );

	}
}

?>