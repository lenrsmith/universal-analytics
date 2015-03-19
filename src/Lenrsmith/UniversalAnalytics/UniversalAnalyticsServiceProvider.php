<?php namespace Lenrsmith\UniversalAnalytics;

use Illuminate\Support\ServiceProvider;

class UniversalAnalyticsServiceProvider extends ServiceProvider
{

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
//		$this->package('lenrsmith/universal-analytics');
		$this->publishes([__DIR__.'/../../config/config.php' => config_path('universal-analytics.php')]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'universal-analytics');
		$this->registerUniversalAnalytics();
	}

    /**
     * Register the application bindings.
     *
     * @return void
     */
    protected function registerUniversalAnalytics()
    {
        $this->app->bind('universal-analytics', function($app)
        {
            return new UniversalAnalytics($app);
        });
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string
	 */
	public function provides()
	{
		return ['universal-analytics'];
	}
}