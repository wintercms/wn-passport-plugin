<?php namespace LukeTowers\Passport;

use App;
use Config;
use Laravel\Passport\Passport;
use LukeTowers\Passport\Classes\Authenticate;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

/**
 * Passport Plugin Information File
 */
class Plugin extends PluginBase
{
    public $middlewareAliases = [
        'auth' => Authenticate::class
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'luketowers.passport::lang.plugin.name',
            'description' => 'luketowers.passport::lang.plugin.description',
            'author'      => 'Luke Towers',
            'icon'        => 'icon-lock',
            'homepage'    => 'https://github.com/LukeTowers/oc-passport-plugin',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Passport Settings',
                'description' => 'Manage passport based settings.',
                'category'    => 'Passport',
                'icon'        => 'icon-cog',
                'class'       => 'LukeTowers\Passport\Models\Settings',
                'order'       => 500,
                'keywords'    => 'user auth passport'
            ]
        ];
    }

    /**
     * Runs right before the request route
     */
    public function boot()
    {
        // Boot middleware aliases
        $this->aliasMiddleware();

        // Disable the Laravel migrations from Passport, handled via plugin updates
        Passport::ignoreMigrations();

        // Setup required packages
        $this->bootPackages();

        // Setup the API routes for Passport
        Passport::routes();
    }

    /**
     * Boots (configures and registers) any packages found within this plugin's packages.load configuration value
     *
     * @see https://luketowers.ca/blog/how-to-use-laravel-packages-in-october-plugins
     * @author Luke Towers <octobercms@luketowers.ca>
     */
    public function bootPackages()
    {
        // Get the namespace of the current plugin to use in accessing the Config of the plugin
        $pluginNamespace = str_replace('\\', '.', strtolower(__NAMESPACE__));

        // Instantiate the AliasLoader for any aliases that will be loaded
        $aliasLoader = AliasLoader::getInstance();

        // Get the packages to boot
        $packages = Config::get($pluginNamespace . '::packages');

        // Boot each package
        foreach ($packages as $name => $options) {
            // Setup the configuration for the package, pulling from this plugin's config
            if (!empty($options['config']) && !empty($options['config_namespace'])) {
                Config::set($options['config_namespace'], $options['config']);
            }

            // Register any Service Providers for the package
            if (!empty($options['providers'])) {
                foreach ($options['providers'] as $provider) {
                    App::register($provider);
                }
            }

            // Register any Aliases for the package
            if (!empty($options['aliases'])) {
                foreach ($options['aliases'] as $alias => $path) {
                    $aliasLoader->alias($alias, $path);
                }
            }
        }
    }

    /**
     * Registers provided middleware aliases with the router
     */
    protected function aliasMiddleware()
    {
        $router = $this->app['router'];

        $method = method_exists($router, 'aliasMiddleware') ? 'aliasMiddleware' : 'middleware';

        foreach ($this->middlewareAliases as $alias => $middleware) {
            $router->$method($alias, $middleware);
        }
    }
}
