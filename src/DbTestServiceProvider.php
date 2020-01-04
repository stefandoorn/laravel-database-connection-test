<?php

namespace StefanDoorn\DatabaseConnection;

use Illuminate\Support\ServiceProvider;

final class DbTestServiceProvider extends ServiceProvider
{
    private $commands = [
        DbTestConnection::class,
    ];

    public function register()
    {
        $this->commands($this->commands);
    }
}
