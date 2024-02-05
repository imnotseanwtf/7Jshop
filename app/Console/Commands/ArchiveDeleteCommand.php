<?php

namespace App\Console\Commands;

use App\Models\Quotation;
use Illuminate\Console\Command;

class ArchiveDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:archive-delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete quotations that are older than 1 month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oneMonthAgo = now()->subMonth();
        Quotation::where('created_at', '<', $oneMonthAgo)->delete();
    }
}
