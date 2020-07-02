<?php
/**
 * Author: Andrei ( @xelyos )
 * Author website: https://xelyos.ro
 * Created at: 7/02/2020 8:35 PM
 * Xelyos Tehnologies
 */

namespace Xelyos\Database;

use Illuminate\Support\ServiceProvider;

class XelyosDatabaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // $this->loadViewsFrom(__DIR__ . '/Resources/views', 'xelyos_database');
        // $this->loadMigrationsFrom(__DIR__ . '/XelyosDatabase/Migrations');
        // $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }

    public function register()
    {
        $this->app->bind('xelyos_database', static function(){
            return new \Xelyos\Database\Models\XelyosDatabase();
        });
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        // $this->publishes([
        //     __DIR__ . '/../config/xelyos_database.php' => config_path('xelyos_database.php'),
        // ], 'xelyos_database.config');
    }
}
