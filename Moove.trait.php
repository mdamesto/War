<?php

trait Moove {
	public function moove($moove) {
		$old_x = $this->pos['x'];
		$old_y = $this->pos['y'];
		if ($this->orient == 'South')
			$this->pos['x'] = $this->pos['x'] - $moove;
		if ($this->orient == 'North')
			$this->pos['x'] = $this->pos['x'] + $moove;
		if ($this->orient == 'East')
			$this->pos['y'] = $this->pos['y'] + $moove;
		if ($this->orient == 'West')
			$this->pos['y'] = $this->pos['y'] - $moove;
		$this->current_man += $moove;
		$this->isMoving = true;
		print ($this->name . ' move from [ ' . $old_x . ' : ' . $old_y . ' ] to [ ' . $this->pos['x'] . ' : ' . $this->pos['y'] . '].' . PHP_EOL);
	}
	public function orient ($rot) {
		if ($this->isMoving == false) {
			$this->orient = $rot;
			print ($this->name . ' is now oriented to ' . $this->orient . PHP_EOL);
		}
		else if ($this->isMoving == true && $this->current_man >= $this_man) {
			$this->orient = $rot;
			print ($this->name . ' is now oriented to ' . $this->orient . PHP_EOL);
			$this->current_man = 0;
		}
		else
			print ($this->name . ' can\'t rotate, due to inertia' . PHP_EOL . ' hope it will not crash into some fucking obstacle' . PHP_EOL );

	}
}

?>