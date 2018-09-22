<?php

namespace emag;

use emag\Helpers\Logger;

class App{

	function isSingle()
	{
		return true;
	}

	function init()
	{
		echo "The game has started!";

		$Logger = new Logger();
	}
}