<?php

namespace StefanDoorn\DatabaseConnection;

use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager as DB;

class DbTestConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:connection {connection=mysql : Connection name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test database connection.';

    /**
     * @var DB
     */
    private $database;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DB $database)
    {
        $this->database = $database;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
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
