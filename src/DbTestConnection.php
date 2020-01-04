<?php

namespace StefanDoorn\DatabaseConnection;

use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager as DB;

final class DbTestConnection extends Command
{
    /** @var string */
    protected $signature = 'db:connection {connection=mysql : Connection name}';

    /** @var string */
    protected $description = 'Test database connection.';

    /** @var DB */
    private $database;

    public function __construct(DB $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    public function handle()
    {
        $connection = $this->argument('connection');
        $name = $this->database->connection($connection)->getDatabaseName();

        try {
            $this->database->connection($connection)->reconnect();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        $this->info(sprintf('Connected with database "%s" through connection "%s"', $name, $connection));
    }
}
