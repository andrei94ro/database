<?php
/**
 * Author: Andrei ( @xelyos )
 * Author website: https://xelyos.ro
 * Created at: 7/02/2020 8:35 PM
 * Xelyos Tehnologies
 */

namespace Xelyos\Database;

use Illuminate\Support\ServiceProvider;
use Xelyos\Database\Console\XelyosDatabaseConsole;

class XelyosDatabaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                XelyosDatabaseConsole::class
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('xelyos_database', static function(){
            return new \Xelyos\Database\Models\XelyosDatabaseModel();
        });
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        //
    }
}
