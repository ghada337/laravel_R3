<?php
namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
class DatabaseBackup extends Command {
    protected $signature = 'db:backup';
    protected $description = 'Automating Daily Backups';
    public function handle() {
        if (! Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $command = "mysqldump --defaults-extra-file=" . base_path() . "/.my.cnf --host=" . env('127.0.0.1') . " " . env('laravel_R3') . " | gzip > " . storage_path() . "/app/backup/" . $filename;

        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);
    }
}
