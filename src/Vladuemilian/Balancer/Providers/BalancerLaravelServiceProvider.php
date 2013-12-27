<?php namespace Vladuemilian\Balancer\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class BalancerLaravelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('vladuemilian/balancer');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		App::bind('Vladuemilian\Balancer\Core\IOrder', 'Vladuemilian\Balancer\Order');	
		App::bind('Vladuemilian\Balancer\Core\IValidator', 'Vladuemilian\Balancer\Src\Validator');
		App::bind('Vladuemilian\Balancer\Core\ITransfer', 'Vladuemilian\Balancer\Src\Transfer');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
