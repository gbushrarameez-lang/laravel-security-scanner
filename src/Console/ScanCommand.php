<?php

namespace Bushra\SecurityScanner\Console;

use Illuminate\Console\Command;
use Bushra\SecurityScanner\Scanner\Scanner;

class ScanCommand extends Command
{
    protected $signature = 'security:scan {path?}';
    protected $description = 'Scan Laravel project for security issues';

    public function handle()
    {
        $path = $this->argument('path') ?? app_path();

        $scanner = new Scanner();

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path)
        );

        foreach ($files as $file) {

            if ($file->getExtension() !== 'php') continue;

            $code = file_get_contents($file->getPathname());

            $issues = $scanner->scan($code);

            foreach ($issues as $issue) {
                $this->warn("[{$issue['severity']}] {$file->getFilename()} (Line {$issue['line']})");
                $this->line($issue['message']);
            }
        }

        $this->info("Scan complete ✅");
    }
}
