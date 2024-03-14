<?php

namespace App\Console\Commands;

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
        // Example with mysqldump
        $backupFilename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';
        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.rtsumc_fire_noc'),
            config('database.connections.mysql.mTtJx%x-8d]}'),
            config('database.connections.mysql.rtsumc_fire_noc_db'),
            storage_path('app/backups/' . $backupFilename)
        );

        // Execute the command
        exec($command);

        // Optionally, you can upload this backup file to cloud storage like S3
        // Storage::disk('s3')->put('backups/' . $backupFilename, file_get_contents(storage_path('app/backups/' . $backupFilename)));

        $this->info("The backup has been successfully created as " . $backupFilename);
    }
}
