# Xelyos Database - for Laravel

## Requirements

```
- PHP 7.4
- Laravel 6/7
```

## Installation

You can install the package via composer:

```bash
composer require xelyos94ro/database
```

## Purpose

In laravel, before you use migrate command you must have a database. This package help you to create one with no effort.

Here's how you can use it:

```php
use Xelyos\Database\Facade\XelyosDatabase;

// If no parameter will be specified, will use the default value from ENV file
XelyosDatabase::checkDatabaseExist();
XelyosDatabase::checkDatabaseExist($nameOfDatabase); 
// Create database (if database exist, another database will not be created)
XelyosDatabase::createDatabase(); 
XelyosDatabase::createDatabase($nameOfDatabase); 
```

This is very usefull for new projects. Just use console command to create database.

```
// This will generate the database
php artisan xelyos:database:create
// And now you can use migrate
php artisan migrate
```
