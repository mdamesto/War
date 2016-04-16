<?php

Trait Move {
	public function			_go($val) {
		$this->_oldPosition = $this->_position;
		switch ($this->_position['dir']) {
			case 'N':
				$this->_position['y'] -= $val;
				break ;
			case 'S':
				$this->_position['y'] += $val;
				break ;
			case 'E':
				$this->_position['x'] += $val;
				break ;
			case 'W':
				$this->_position['x'] -= $val;
				break ;
		}
		if ($this->_moved === 0)
			$this->_state = 'motionless';
		else
			$this->_state = 'motion';
		$this->_lastState = $this->_state;
	}

	protected function			_tryRun($val) {
		if ($val > $this->_speed)
			$val = $this->_speed;
		else if ($val < $this->_maneuvre) {
			$val = $this->_maneuvre;
			$this->_maneuvre = 0;
		}
		else
			$this->_maneuvre = 0;
		$this->_speed -= $val;
		$this->_moved += $val;
		$this->_go($val);
		return TRUE;
	}

	protected function			_tryStop($val) {
		if ($this->_lastState === 'motion' AND $this->_maneuvre > 0)
			$this->_go($this->_maneuvre);
		return TRUE;
	}

	protected function			_tryLeft($val) {
		$this->_oldPosition = $this->_position;
		if ($this->_position['dir'] == 'S')
			$this->_position['dir'] = 'W';
		else if ($this->_position['dir'] == 'W')
			$this->_position['dir'] = 'N';
		else if ($this->_position['dir'] == 'N')
			$this->_position['dir'] = 'E';
		else if ($this->_position['dir'] == 'E')
			$this->_position['dir'] = 'S';
	}

	protected function			_tryRight($val) {
		$this->_oldPosition = $this->_position;
		if ($this->_position['dir'] == 'S')
			$this->_position['dir'] = 'E';
		else if ($this->_position['dir'] == 'E')
			$this->_position['dir'] = 'N';
		else if ($this->_position['dir'] == 'N')
			$this->_position['dir'] = 'W';
		else if ($this->_position['dir'] == 'W')
			$this->_position['dir'] = 'S';
	}

	protected function			_noMove($val) {
		if ($this->_lastState === 'motion' AND $this->_maneuvre > 0)
			$this->_go($this->_maneuvre);
		return TRUE;
	}

	public function				tryMove($id, $val) {
		if ($this->_speed === 0)
			return FALSE;
		//print ($val . PHP_EOL);
		switch ($id) {
			case 'run':
				return $this->_tryRun($val);
			case 'stop':
				return $this->_tryStop($val);
			case 'turnLeft':
				return $this->_tryLeft($val);
			case 'turnRight':
				return $this->_tryRight($val);
			case 'next':
				return $this->_noMove($val);
		}
		return FALSE;
	}

}

?>