<?php

namespace App\Console\Commands;

use App\Events\NewCommentEvent;
use App\Events\NewPostEvent;
use Illuminate\Console\Command;

class NewPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new-post-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = 'test';
        event(new NewCommentEvent($id));
    }
}
