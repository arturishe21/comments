<?php namespace Vis\Comments;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider {

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
		$this->package('vis/comments');
        include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app['comments'] = $this->app->share(function($app)
        {
            return new \Vis\Comments\Comment;
        });

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Comments', 'Vis\Comments\Facades\Comments');
        });
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
