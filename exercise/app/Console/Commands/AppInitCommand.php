<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppInitCommand extends Command
{
    protected $signature = 'app:init';
    protected $description = 'Refresh migrate and seed data.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}
