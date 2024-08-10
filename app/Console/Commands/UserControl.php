<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class UserControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-control';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'aktivasyon yapmayan kullanıcıları sil';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("kullanıcı silindi ");
    }
}
