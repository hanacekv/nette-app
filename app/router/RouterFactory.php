<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('kontakty/', 'Contact:default');
		$router[] = new Route('clanky/', 'Article:default');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:about');
		return $router;
	}
}
