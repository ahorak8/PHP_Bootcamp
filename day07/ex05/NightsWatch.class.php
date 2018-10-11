<?php
	class NightsWatch implements IFighter
	{
		private $soldier = array();
		public function recruit($s)
			{
				$this->soldier[] = $s;
			}
		function fight()
		{
			foreach ($this->soldier as $s) {
				if (method_exists(get_class($s), 'fight'))
					$s->fight();
			}
		}
	}
?>