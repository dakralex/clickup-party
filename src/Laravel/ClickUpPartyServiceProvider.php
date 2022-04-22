<?php

namespace Dakralex\ClickUpParty\Laravel;

use Illuminate\Support\ServiceProvider;

class ClickUpPartyServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/clickup-party.php' => config_path('clickup-party.php'),
			], 'config');
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/clickup-party.php', 'clickup-party');
	}

}
