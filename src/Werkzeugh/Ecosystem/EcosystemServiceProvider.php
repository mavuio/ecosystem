<?php namespace Werkzeugh\Ecosystem;

use Illuminate\Support\ServiceProvider;

class EcosystemServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	    $this->app->bindShared('werkzeugh.ecoasset', function ($app) {
            return new EcoAsset();
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('EcoAsset', 'Werkzeugh\Ecosystem\Facades\EcoAssetFacade');
        });

        $this->app->register('Werkzeugh\Corelib\CorelibServiceProvider');

        // $this->app->bind('Werkzeugh\Ecosystem\ControllerExtensionInterface', function() {
        //     return new \Werkzeugh\EcosystemOrchestra\ControllerExtension();
        // });

        // $this->app->bindShared('eco.asset', function ($app) {
        //     return new \Orchestra\Asset\Environment($app['orchestra.asset.dispatcher']);
        // });

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
