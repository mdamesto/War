<?php

Trait Power {

	protected function		resetPP() {
		$this->_Pp = $this->_PpInit;
		$this->_speed = $this->_speedInit;
		$this->_Ps = $this->_PsInit;
		foreach ($this->_weapons as $weapon)
			$weapon->reset();
	}

	public function			repare() {
		if ($this->_Pp < 1)
			return FALSE;
		if ($this->_Pv < $this->_PvInit)	// D6
			$this->_Pv += 1;
		$this->_Pp -= 1;
	}

	public function			givePPshield($PP) {
		if ($PP > $this->_Pp)
			return FALSE;
		$this->_Pp -= $PP;
		$this->_Ps += $PP;
	}

	public function			givePPspeed($PP) {
		if ($PP > $this->_Pp)
			return FALSE;
		$this->_Pp -= $PP;
		$this->_speed += $PP;				//	D6
	}
}

?>