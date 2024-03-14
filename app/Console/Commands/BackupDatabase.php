<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database to local storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $backupFilename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            storage_path('app/backups/' . $backupFilename)
        );

        // Execute the command
        exec($command);

    }
}
