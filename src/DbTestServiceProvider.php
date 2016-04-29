<?php

namespace StefanDoorn\DatabaseConnection;

use Illuminate\Support\ServiceProvider;

/**
 * Class DbTestServiceProvider
 * @package StefanDoorn\DatabaseConnection
 */
class DbTestServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    private $commands = [
        DbTestConnection::class,
    ];

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
