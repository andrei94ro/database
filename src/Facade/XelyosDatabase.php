<?php
/**
 * Author: Andrei ( @xelyos )
 * Author website: https://xelyos.ro
 * Created at: 7/02/2020 8:35 PM
 * Xelyos Tehnologies
 */

namespace Xelyos\Database\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class XelyosDatabase
 *
 * @method static createDatabase(string $databaseName = null)
 * @method static checkDatabaseExist(string $databaseName = null);
 */
class XelyosDatabase extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'xelyos_database';
    }
}
