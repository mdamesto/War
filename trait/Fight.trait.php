<?php

trait Fight {
	abstract function		fire($target);
	
	public function			hearted($damage)
	{
		if ($damage >= ($this->_Pv + $this->_Ps))
			return TRUE;
		if ($damage <= $this->_Ps)
		{
			$this->_Ps -= $damage;
			return FALSE;
		}
		$damage -= $this->_Ps;
		$this->_Ps = 0;
		$this->_Pv -= $damage;
		return FALSE;
	}
}

?>