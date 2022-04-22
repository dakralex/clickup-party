<?php

namespace Dakralex\ClickUpParty;

use Illuminate\Support\Facades\Facade;

class ClickUpParty extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'clickup-party';
	}

}
