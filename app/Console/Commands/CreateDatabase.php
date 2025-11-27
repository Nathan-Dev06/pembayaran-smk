<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Membuat database sesuai nama DB_DATABASE di file .env';

    public function handle()
    {
        $dbName = Config::get('database.connections.mysql.database');

        // kosongkan nama database dulu agar MySQL tidak error
        Config::set('database.connections.mysql.database', null);

        try {
            DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName`");
            $this->info("Database '$dbName' berhasil dibuat.");
        } catch (\Exception $e) {
            $this->error("Gagal membuat database: " . $e->getMessage());
        }

        return Command::SUCCESS;
    }
}
