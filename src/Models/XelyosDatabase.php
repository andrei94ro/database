<?php
/**
 * Author: Andrei ( @xelyos )
 * Author website: https://xelyos.ro
 * Created at: 7/02/2020 8:35 PM
 * Xelyos Tehnologies
 */

namespace Xelyos\Database\Models;

use PDO;
use PDOException;

class XelyosDatabase
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->getPDOConnection();
    }

    /**
     * Create database
     *
     * @param  string|null  $databaseName
     */
    public function createDatabase(string $databaseName = null): void
    {
        if ($databaseName === null) {
            $databaseName = config('database.connections.mysql.database');
        }

        if (!$databaseName) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        if(!$this->checkDatabaseExist()) {
            try {
                $this->pdo->exec(sprintf(
                    'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                    $databaseName,
                    config('database.connections.mysql.charset'),
                    config('database.connections.mysql.collation')
                ));

                $this->info(sprintf('Successfully created %s database', $databaseName));
            } catch (PDOException $exception) {
                $this->error(sprintf('Failed to create %s database, %s', $databaseName, $exception->getMessage()));
            }
        } else {
            $this->info(sprintf('Databse %s already exist', $databaseName));
        }
    }

    /**
     * Check if database exist. Return true if database exist, false otherwise
     *
     * @param  string|null  $databaseName
     *
     * @return bool
     */
    public function checkDatabaseExist(string $databaseName = null): bool
    {
        if($databaseName === null) {
            $databaseName = config('database.connections.mysql.database');
        }

        $query = $this->pdo->query(sprintf(
            "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '%s'",
            $databaseName
        ));

        $result = $query->fetchAll(PDO::FETCH_COLUMN);

        return !empty($result);
    }

    /**
     * Get the PDO connection
     *
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     *
     * @return PDO
     */
    private function getPDOConnection(string $host = null, int $port = null, string $username = null, string $password = null): PDO
    {
        if($host === null) {
            $host = config('database.connections.mysql.host');
        }

        if($port === null) {
            $port = config('database.connections.mysql.port');
        }

        if($username === null) {
            $username = config('database.connections.mysql.username');
        }

        if($password === null) {
            $password = config('database.connections.mysql.password');
        }

        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
